(() => {
    'use strict';

    const initializeDashboard = (root) => {
        if (root.dataset.initialized === 'true') return;
        root.dataset.initialized = 'true';

        const $ = (selector) => root.querySelector(selector);
        const $$ = (selector) => Array.from(root.querySelectorAll(selector));
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const toast = $('[data-dashboard-toast]');
        const toastText = $('[data-dashboard-toast-text]');
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
                toast.classList.remove('is-visible');
                window.setTimeout(() => {
                    toast.hidden = true;
                }, 220);
            }, 3200);
        };

        const closeToast = () => {
            if (!toast) return;
            window.clearTimeout(toastTimer);
            toast.classList.remove('is-visible');
            window.setTimeout(() => {
                toast.hidden = true;
            }, 220);
        };

        const renderDate = () => {
            const dateElement = $('[data-current-date]');
            if (!dateElement) return;

            const formatted = new Intl.DateTimeFormat('pt-BR', {
                weekday: 'long',
                day: '2-digit',
                month: 'long',
                year: 'numeric',
            }).format(new Date());

            const label = formatted.charAt(0).toUpperCase() + formatted.slice(1);
            const icon = dateElement.querySelector('svg');
            dateElement.replaceChildren();
            if (icon) dateElement.append(icon);
            dateElement.append(document.createTextNode(label));
            dateElement.dateTime = new Date().toISOString().slice(0, 10);
        };

        const animateCounter = (element) => {
            if (element.dataset.animated === 'true') return;
            element.dataset.animated = 'true';

            const target = Number(element.dataset.counter || 0);
            const decimals = Number(element.dataset.decimals || 0);

            if (reduceMotion || target === 0) {
                element.textContent = target.toFixed(decimals);
                return;
            }

            const duration = 850;
            const startedAt = performance.now();

            const update = (now) => {
                const progress = Math.min((now - startedAt) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                const value = target * eased;
                element.textContent = value.toFixed(decimals);

                if (progress < 1) {
                    window.requestAnimationFrame(update);
                } else {
                    element.textContent = target.toFixed(decimals);
                }
            };

            element.textContent = (0).toFixed(decimals);
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
            }, { threshold: 0.55 });

            counters.forEach((counter) => observer.observe(counter));
        };

        const initializeProgress = () => {
            $$('[data-progress]').forEach((progress) => {
                const value = Math.max(0, Math.min(100, Number(progress.dataset.progress || 0)));

                if (reduceMotion) {
                    progress.style.setProperty('--progress', value);
                    return;
                }

                progress.style.setProperty('--progress', 0);
                const duration = 900;
                const startedAt = performance.now() + 150;

                const update = (now) => {
                    if (now < startedAt) {
                        window.requestAnimationFrame(update);
                        return;
                    }

                    const elapsed = Math.min((now - startedAt) / duration, 1);
                    const eased = 1 - Math.pow(1 - elapsed, 3);
                    progress.style.setProperty('--progress', (value * eased).toFixed(2));

                    if (elapsed < 1) window.requestAnimationFrame(update);
                };

                window.requestAnimationFrame(update);
            });
        };

        const initializeCollapsibles = () => {
            $$('[data-collapsible]').forEach((section) => {
                const button = section.querySelector('[data-collapsible-toggle]');
                if (!button) return;

                button.addEventListener('click', () => {
                    const collapsed = section.classList.toggle('is-collapsed');
                    button.setAttribute('aria-expanded', String(!collapsed));
                    button.setAttribute(
                        'aria-label',
                        collapsed ? 'Expandir informações obrigatórias' : 'Recolher informações obrigatórias',
                    );
                });
            });
        };

        const initializeServiceFilters = () => {
            const buttons = $$('[data-service-filter]');
            const services = $$('[data-service-status]');
            const emptyState = $('[data-service-empty]');
            if (!buttons.length || !services.length) return;

            const matchesFilter = (status, filter) => {
                if (filter === 'todos') return true;
                if (filter === 'ativos') return status === 'andamento' || status === 'aguardando';
                if (filter === 'finalizados') return status === 'finalizado';
                return true;
            };

            buttons.forEach((button) => {
                button.addEventListener('click', () => {
                    const filter = button.dataset.serviceFilter;
                    let visible = 0;

                    buttons.forEach((item) => {
                        const active = item === button;
                        item.classList.toggle('is-active', active);
                        item.setAttribute('aria-pressed', String(active));
                    });

                    services.forEach((service) => {
                        const show = matchesFilter(service.dataset.serviceStatus, filter);
                        service.hidden = !show;
                        if (show) visible += 1;
                    });

                    if (emptyState) emptyState.hidden = visible !== 0;
                });
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
            }, { threshold: 0.08, rootMargin: '0px 0px -30px' });

            elements.forEach((element, index) => {
                element.style.transitionDelay = `${Math.min(index * 35, 180)}ms`;
                observer.observe(element);
            });
        };

        $$('[data-placeholder-action]').forEach((element) => {
            element.addEventListener('click', (event) => {
                event.preventDefault();
                showToast('Esta ação está pronta para receber a rota ou funcionalidade definitiva.');
            });
        });

        $('[data-dashboard-toast-close]')?.addEventListener('click', closeToast);

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeToast();
        });

        renderDate();
        initializeCounters();
        initializeProgress();
        initializeCollapsibles();
        initializeServiceFilters();
        initializeReveals();
    };

    const start = () => {
        document.querySelectorAll('[data-dashboard-colaborador]').forEach(initializeDashboard);
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', start, { once: true });
    } else {
        start();
    }
})();