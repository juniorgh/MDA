(() => {
    'use strict';

    const initialize = (root) => {
        if (root.dataset.initialized === 'true') {
            return;
        }

        root.dataset.initialized = 'true';

        const $ = (selector) => root.querySelector(selector);
        const $$ = (selector) =>
            Array.from(root.querySelectorAll(selector));

        const form = $('[data-category-form]');
        const name = $('[data-name]');
        const slug = $('[data-slug]');
        const description = $('[data-description]');
        const order = $('[data-order]');
        const active = $('[data-active]');
        const iconInput = $('[data-icon-input]');
        const submit = $('[data-submit]');
        const submitLabel = $('[data-submit-label]');

        const slugify = (value) => {
            return value
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
        };

        let slugManuallyChanged =
            root.dataset.editing === 'true' ||
            (
                slug.value &&
                slug.value !== slugify(name.value)
            );

        const updatePreview = () => {
            $('[data-preview-name]').textContent =
                name.value.trim() || 'Nome da categoria';

            $('[data-preview-description]').textContent =
                description.value.trim() ||
                'Descrição da categoria';

            $('[data-preview-slug]').textContent =
                slug.value.trim() || 'categoria';

            $('[data-preview-order]').textContent =
                order.value || '0';

            $('[data-description-count]').textContent =
                `${description.value.length}/160`;

            const status = $('[data-preview-status]');

            status.textContent =
                active.checked ? 'Ativa' : 'Inativa';

            status.classList.toggle(
                'is-active',
                active.checked
            );

            $('[data-active-label]').textContent =
                active.checked
                    ? 'Categoria ativa'
                    : 'Categoria inativa';
        };

        const selectIcon = (button) => {
            const icon = button.dataset.icon;

            iconInput.value = icon;

            $$('[data-icon]').forEach((item) => {
                const selected = item === button;

                item.classList.toggle(
                    'is-selected',
                    selected
                );

                item.setAttribute(
                    'aria-pressed',
                    String(selected)
                );
            });

            $('[data-preview-icon] use')
                .setAttribute(
                    'href',
                    `#mda-cat-icon-${icon}`
                );
        };

        $$('[data-icon]').forEach((button) => {
            button.addEventListener('click', () => {
                selectIcon(button);
            });
        });

        name.addEventListener('input', () => {
            if (!slugManuallyChanged) {
                slug.value = slugify(name.value);
            }

            updatePreview();
        });

        slug.addEventListener('input', () => {
            slugManuallyChanged = true;
            slug.value = slugify(slug.value);
            updatePreview();
        });

        $('[data-generate-slug]').addEventListener(
            'click',
            () => {
                slug.value = slugify(name.value);
                slugManuallyChanged = false;
                slug.focus();
                updatePreview();
            }
        );

        description.addEventListener(
            'input',
            updatePreview
        );

        order.addEventListener('input', () => {
            if (Number(order.value) < 0) {
                order.value = 0;
            }

            updatePreview();
        });

        active.addEventListener(
            'change',
            updatePreview
        );

        const validateField = (field) => {
            const wrapper =
                field.closest('.mda-cat__field');

            if (!wrapper) {
                return true;
            }

            const error =
                wrapper.querySelector(
                    '[data-client-error]'
                );

            const valid = field.checkValidity();

            wrapper.classList.toggle(
                'is-invalid',
                !valid
            );

            field.setAttribute(
                'aria-invalid',
                String(!valid)
            );

            if (error) {
                error.hidden = valid;
                error.textContent =
                    valid ? '' : field.validationMessage;
            }

            return valid;
        };

        $$('[data-validate]').forEach((field) => {
            field.addEventListener('input', () => {
                const serverError =
                    field
                        .closest('.mda-cat__field')
                        ?.querySelector(
                            '[data-server-error]'
                        );

                if (serverError) {
                    serverError.hidden = true;
                }

                validateField(field);
            });
        });

        form.addEventListener('submit', (event) => {
            const fields = $$('[data-validate]');
            let firstInvalid = null;

            fields.forEach((field) => {
                if (!validateField(field) && !firstInvalid) {
                    firstInvalid = field;
                }
            });

            if (firstInvalid) {
                event.preventDefault();
                firstInvalid.focus();
                return;
            }

            submit.disabled = true;
            submit.classList.add('is-loading');
            submitLabel.textContent = 'Salvando...';
        });

        window.addEventListener('pageshow', () => {
            submit.disabled = false;
            submit.classList.remove('is-loading');

            submitLabel.textContent =
                root.dataset.editing === 'true'
                    ? 'Salvar alterações'
                    : 'Cadastrar categoria';
        });

        updatePreview();
    };

    const start = () => {
        document
            .querySelectorAll('[data-category-editor]')
            .forEach(initialize);
    };

    document.readyState === 'loading'
        ? document.addEventListener(
            'DOMContentLoaded',
            start
        )
        : start();
})();