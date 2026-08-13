(() => {
    'use strict';

    const initializeProfile = (root) => {
        if (root.dataset.initialized === 'true') return;
        root.dataset.initialized = 'true';

        const $ = (selector, context = root) => context.querySelector(selector);
        const $$ = (selector, context = root) => Array.from(context.querySelectorAll(selector));
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const toast = $('[data-profile-toast]');
        const toastText = $('[data-profile-toast-text]');
        let toastTimer;

        const showToast = (message) => {
            if (!toast || !toastText) return;

            window.clearTimeout(toastTimer);
            toastText.textContent = message;
            toast.hidden = false;

            window.requestAnimationFrame(() => {
                toast.classList.add('is-visible');
            });

            toastTimer = window.setTimeout(() => {
                closeToast();
            }, 3200);
        };

        const closeToast = () => {
            if (!toast) return;

            window.clearTimeout(toastTimer);
            toast.classList.remove('is-visible');

            window.setTimeout(() => {
                toast.hidden = true;
            }, reduceMotion ? 0 : 220);
        };

        const formatCounter = (value, decimals, suffix) => {
            return value.toLocaleString('pt-BR', {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals,
            }) + suffix;
        };

        const animateCounter = (element) => {
            if (element.dataset.animated === 'true') return;
            element.dataset.animated = 'true';

            const target = Number(element.dataset.counter || 0);
            const decimals = Number(element.dataset.decimals || 0);
            const suffix = element.dataset.suffix || '';

            if (reduceMotion || target === 0) {
                element.textContent = formatCounter(target, decimals, suffix);
                return;
            }

            const duration = 850;
            const startedAt = performance.now();

            const update = (now) => {
                const progress = Math.min((now - startedAt) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                const current = target * eased;

                element.textContent = formatCounter(current, decimals, suffix);

                if (progress < 1) {
                    window.requestAnimationFrame(update);
                } else {
                    element.textContent = formatCounter(target, decimals, suffix);
                }
            };

            element.textContent = formatCounter(0, decimals, suffix);
            window.requestAnimationFrame(update);
        };

        const initializeCounters = () => {
            const counters = $$('[data-counter]');
            if (!counters.length) return;

            if (reduceMotion || !('IntersectionObserver' in window)) {
                counters.forEach(animateCounter);
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                });
            }, { threshold: 0.5 });

            counters.forEach((counter) => observer.observe(counter));
        };

        const initializeProgress = () => {
            $$('[data-progress]').forEach((progress) => {
                const target = Math.max(0, Math.min(100, Number(progress.dataset.progress || 0)));

                if (reduceMotion) {
                    progress.style.setProperty('--progress', target);
                    return;
                }

                progress.style.setProperty('--progress', 0);
                const startedAt = performance.now() + 130;
                const duration = 900;

                const update = (now) => {
                    if (now < startedAt) {
                        window.requestAnimationFrame(update);
                        return;
                    }

                    const elapsed = Math.min((now - startedAt) / duration, 1);
                    const eased = 1 - Math.pow(1 - elapsed, 3);
                    progress.style.setProperty('--progress', (target * eased).toFixed(2));

                    if (elapsed < 1) window.requestAnimationFrame(update);
                };

                window.requestAnimationFrame(update);
            });
        };

        const initializeReveals = () => {
            const elements = $$('[data-reveal]');
            if (!elements.length) return;

            if (reduceMotion || !('IntersectionObserver' in window)) {
                elements.forEach((element) => element.classList.add('is-visible'));
                return;
            }

            root.classList.add('is-enhanced');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -28px',
            });

            elements.forEach((element, index) => {
                element.style.transitionDelay = `${Math.min(index * 32, 160)}ms`;
                observer.observe(element);
            });
        };

        const initializeTabs = () => {
            const tabs = $$('[data-profile-tab]');
            const sections = $$('[data-profile-section]');
            if (!tabs.length || !sections.length) return;

            const selectTab = (id) => {
                tabs.forEach((tab) => {
                    const active = tab.getAttribute('href') === `#${id}`;
                    tab.classList.toggle('is-active', active);

                    if (active) {
                        tab.setAttribute('aria-current', 'page');
                        tab.scrollIntoView({
                            behavior: reduceMotion ? 'auto' : 'smooth',
                            block: 'nearest',
                            inline: 'center',
                        });
                    } else {
                        tab.removeAttribute('aria-current');
                    }
                });
            };

            tabs.forEach((tab) => {
                tab.addEventListener('click', (event) => {
                    const selector = tab.getAttribute('href');
                    const section = selector ? $(selector) : null;
                    if (!section) return;

                    event.preventDefault();
                    selectTab(section.id);
                    section.scrollIntoView({
                        behavior: reduceMotion ? 'auto' : 'smooth',
                        block: 'start',
                    });

                    if (window.history?.replaceState) {
                        window.history.replaceState(null, '', selector);
                    }
                });
            });

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    const visible = entries
                        .filter((entry) => entry.isIntersecting)
                        .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];

                    if (visible?.target?.id) selectTab(visible.target.id);
                }, {
                    threshold: [0.15, 0.35, 0.6],
                    rootMargin: '-18% 0px -62%',
                });

                sections.forEach((section) => observer.observe(section));
            }
        };

        const initializeServiceFilters = () => {
            const buttons = $$('[data-service-filter]');
            const services = $$('[data-service-status]');
            const emptyState = $('[data-service-empty]');
            if (!buttons.length || !services.length) return;

            buttons.forEach((button) => {
                button.addEventListener('click', () => {
                    const filter = button.dataset.serviceFilter;
                    let visibleCount = 0;

                    buttons.forEach((item) => {
                        const active = item === button;
                        item.classList.toggle('is-active', active);
                        item.setAttribute('aria-pressed', String(active));
                    });

                    services.forEach((service) => {
                        const visible = filter === 'todos' || service.dataset.serviceStatus === filter;
                        service.hidden = !visible;
                        if (visible) visibleCount += 1;
                    });

                    if (emptyState) emptyState.hidden = visibleCount !== 0;
                });
            });
        };

        const fallbackCopy = (value) => {
            const textarea = document.createElement('textarea');
            textarea.value = value;
            textarea.setAttribute('readonly', '');
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.append(textarea);
            textarea.select();

            const copied = document.execCommand('copy');
            textarea.remove();
            return copied;
        };

        const copyValue = async (value) => {
            if (navigator.clipboard && window.isSecureContext) {
                await navigator.clipboard.writeText(value);
                return true;
            }

            return fallbackCopy(value);
        };

        const initializeCopyButtons = () => {
            $$('[data-copy]').forEach((button) => {
                button.addEventListener('click', async () => {
                    const value = button.dataset.copy || '';
                    const label = button.dataset.copyLabel || 'Informação';

                    try {
                        const copied = await copyValue(value);
                        showToast(copied ? `${label} copiado.` : `Não foi possível copiar ${label.toLowerCase()}.`);
                    } catch {
                        showToast(`Não foi possível copiar ${label.toLowerCase()}.`);
                    }
                });
            });
        };

        const initializeBlockModal = () => {
            const modal = $('[data-block-modal]');
            const dialog = $('[data-block-dialog]');
            const openButton = $('[data-block-open]');
            const closeButtons = $$('[data-block-close]');
            const confirmButton = $('[data-block-confirm]');
            if (!modal || !dialog || !openButton) return;

            let lastFocused = null;
            let closeTimer;

            const openModal = () => {
                window.clearTimeout(closeTimer);
                lastFocused = document.activeElement;
                modal.hidden = false;
                document.body.classList.add('collaborator-profile-modal-open');

                window.requestAnimationFrame(() => {
                    modal.classList.add('is-open');
                    dialog.focus();
                });
            };

            const closeModal = () => {
                modal.classList.remove('is-open');
                document.body.classList.remove('collaborator-profile-modal-open');

                closeTimer = window.setTimeout(() => {
                    modal.hidden = true;
                    lastFocused?.focus?.();
                }, reduceMotion ? 0 : 220);
            };

            openButton.addEventListener('click', openModal);
            closeButtons.forEach((button) => button.addEventListener('click', closeModal));

            confirmButton?.addEventListener('click', () => {
                closeModal();
                showToast('Confirmação pronta para ser conectada à rota de bloqueio.');
            });

            document.addEventListener('keydown', (event) => {
                if (modal.hidden) return;

                if (event.key === 'Escape') {
                    closeModal();
                    return;
                }

                if (event.key !== 'Tab') return;

                const focusable = $$('button, a[href], input, select, textarea, [tabindex]:not([tabindex="-1"])', dialog)
                    .filter((element) => !element.disabled && !element.hidden);

                if (!focusable.length) return;

                const first = focusable[0];
                const last = focusable[focusable.length - 1];

                if (event.shiftKey && document.activeElement === first) {
                    event.preventDefault();
                    last.focus();
                } else if (!event.shiftKey && document.activeElement === last) {
                    event.preventDefault();
                    first.focus();
                }
            });

            window.addEventListener('pageshow', () => {
                modal.hidden = true;
                modal.classList.remove('is-open');
                document.body.classList.remove('collaborator-profile-modal-open');
            });
        };

        $$('[data-placeholder-action]').forEach((element) => {
            element.addEventListener('click', (event) => {
                event.preventDefault();
                showToast('Esta ação está pronta para receber a rota definitiva.');
            });
        });

        $('[data-profile-toast-close]')?.addEventListener('click', closeToast);

        initializeCounters();
        initializeProgress();
        initializeReveals();
        initializeTabs();
        initializeServiceFilters();
        initializeCopyButtons();
        initializeBlockModal();
    };

    const start = () => {
        document
            .querySelectorAll('[data-collaborator-profile]')
            .forEach(initializeProfile);
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', start, { once: true });
    } else {
        start();
    }
})();