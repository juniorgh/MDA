(() => {
    'use strict';

    const STORAGE_KEY = 'mda-menu-collapsed';
    const MOBILE_QUERY = '(max-width: 860px)';

    const startMenu = (shell) => {
        if (shell.dataset.mdaMenuStarted === 'true') {
            return;
        }

        shell.dataset.mdaMenuStarted = 'true';

        const sidebar =
            shell.querySelector('[data-mda-sidebar]');

        const mobileButton =
            shell.querySelector('[data-mda-menu-open]');

        const collapseButton =
            shell.querySelector('[data-mda-menu-collapse]');

        const overlay =
            shell.querySelector('[data-mda-menu-overlay]');

        const navigationLinks =
            shell.querySelectorAll('[data-mda-navigation-link]');

        if (
            !sidebar ||
            !mobileButton ||
            !collapseButton ||
            !overlay
        ) {
            console.warn(
                'MDA Menu: estrutura incompleta.'
            );

            return;
        }

        const mobileMedia =
            window.matchMedia(MOBILE_QUERY);

        let collapsed = false;
        let mobileOpen = false;
        let bodyOverflowBeforeOpen = '';

        try {
            collapsed =
                localStorage.getItem(STORAGE_KEY) ===
                'true';
        } catch {
            collapsed = false;
        }

        const isMobile = () => {
            return mobileMedia.matches;
        };

        const saveCollapsedState = () => {
            try {
                localStorage.setItem(
                    STORAGE_KEY,
                    String(collapsed)
                );
            } catch {
                // O menu funciona mesmo sem localStorage.
            }
        };

        const updateState = () => {
            const desktopCollapsed =
                collapsed && !isMobile();

            const openedOnMobile =
                mobileOpen && isMobile();

            shell.classList.toggle(
                'is-menu-collapsed',
                desktopCollapsed
            );

            shell.classList.toggle(
                'is-menu-open',
                openedOnMobile
            );

            collapseButton.setAttribute(
                'aria-expanded',
                String(!desktopCollapsed)
            );

            collapseButton.setAttribute(
                'aria-label',
                isMobile()
                    ? 'Fechar menu'
                    : (
                        desktopCollapsed
                            ? 'Expandir menu'
                            : 'Recolher menu'
                    )
            );

            mobileButton.setAttribute(
                'aria-expanded',
                String(openedOnMobile)
            );

            sidebar.setAttribute(
                'aria-hidden',
                String(isMobile() && !openedOnMobile)
            );

            overlay.tabIndex =
                openedOnMobile ? 0 : -1;
        };

        const openMobileMenu = () => {
            if (!isMobile()) {
                return;
            }

            mobileOpen = true;

            bodyOverflowBeforeOpen =
                document.body.style.overflow;

            document.body.style.overflow =
                'hidden';

            updateState();

            window.requestAnimationFrame(() => {
                collapseButton.focus({
                    preventScroll: true
                });
            });
        };

        const closeMobileMenu = (
            returnFocus = false
        ) => {
            mobileOpen = false;

            document.body.style.overflow =
                bodyOverflowBeforeOpen;

            updateState();

            if (returnFocus && isMobile()) {
                mobileButton.focus({
                    preventScroll: true
                });
            }
        };

        mobileButton.addEventListener(
            'click',
            () => {
                if (mobileOpen) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            }
        );

        collapseButton.addEventListener(
            'click',
            () => {
                if (isMobile()) {
                    closeMobileMenu(true);
                    return;
                }

                collapsed = !collapsed;

                saveCollapsedState();
                updateState();
            }
        );

        overlay.addEventListener(
            'click',
            () => {
                closeMobileMenu(true);
            }
        );

        navigationLinks.forEach((link) => {
            link.addEventListener('click', () => {
                if (isMobile()) {
                    closeMobileMenu();
                }
            });
        });

        document.addEventListener(
            'keydown',
            (event) => {
                if (
                    event.key === 'Escape' &&
                    mobileOpen
                ) {
                    closeMobileMenu(true);
                }
            }
        );

        const handleScreenChange = () => {
            if (!isMobile()) {
                mobileOpen = false;

                document.body.style.overflow =
                    bodyOverflowBeforeOpen;
            }

            updateState();
        };

        if (
            typeof mobileMedia.addEventListener ===
            'function'
        ) {
            mobileMedia.addEventListener(
                'change',
                handleScreenChange
            );
        } else {
            mobileMedia.addListener(
                handleScreenChange
            );
        }

        updateState();
    };

    const initializeMenus = () => {
        document
            .querySelectorAll('[data-mda-shell]')
            .forEach(startMenu);
    };

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            initializeMenus
        );
    } else {
        initializeMenus();
    }
})();