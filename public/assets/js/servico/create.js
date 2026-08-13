/* MDA — Solicitação de serviço
   JavaScript puro, sem bibliotecas e sem variáveis globais. */

(() => {
  'use strict';

  const initialize = (root) => {
    if (root.dataset.initialized === 'true') return;
    root.dataset.initialized = 'true';

    const $ = (selector) => root.querySelector(selector);
    const $$ = (selector) => Array.from(root.querySelectorAll(selector));

    const form = $('[data-form]');
    const title = $('[data-title]');
    const description = $('[data-description]');
    const filesInput = $('[data-files]');
    const fileList = $('[data-file-list]');
    const budgetMin = $('[data-budget-min]');
    const budgetMax = $('[data-budget-max]');
    const terms = $('[data-terms]');
    const nextButton = $('[data-next]');
    const previousButton = $('[data-previous]');
    const publishButton = $('[data-publish]');
    const notice = $('[data-notice]');
    const modal = $('[data-modal]');

    const initialCategory = $(
      '[data-categories] .mda-sr__category.is-selected'
    );

    const categoryInput = $('[data-category-input]');

    const state = {
      step: 1,
      maxStep: 1,

      categoryId:
        initialCategory?.dataset.id ||
        categoryInput?.value ||
        '',

      category:
        initialCategory?.dataset.name ||
        'Categoria não selecionada',

      categoryIcon:
        initialCategory?.dataset.icon ||
        'service',

      serviceType:
        $('[data-service-type-input]')?.value ||
        'Instalação',

      location:
        $('[data-location-input]')?.value ||
        'saved',

      urgency:
        $('[data-urgency-input]')?.value ||
        'Nesta semana',

      period:
        $('[data-period-input]')?.value ||
        'Manhã',

      budgetMode:
        $('[data-budget-mode-input]')?.value ||
        'range',

      files: []
    };

    const money = (value) => {
      const number =
        Number(String(value).replace(/\D/g, '')) || 0;

      return number.toLocaleString('pt-BR');
    };

    const showNotice = (message, success = false) => {
      if (!notice) return;

      notice.hidden = false;
      notice.classList.toggle('is-success', success);

      const icon = notice.querySelector('span');
      const text = $('[data-notice-text]');

      if (icon) {
        icon.textContent = success ? '✓' : '!';
      }

      if (text) {
        text.textContent = message;
      }

      if (success) {
        window.setTimeout(() => {
          notice.hidden = true;
        }, 3200);
      }
    };

    const clearNotice = () => {
      if (!notice) return;

      notice.hidden = true;
      notice.classList.remove('is-success');
    };

    const setSegmented = (container, value) => {
      if (!container) return;

      container.querySelectorAll('button').forEach((button) => {
        const active = button.dataset.value === value;

        button.classList.toggle('is-active', active);
        button.textContent =
          `${active ? '✓ ' : ''}${button.dataset.value}`;
      });
    };

    const setChoices = (container, value) => {
      if (!container) return;

      container.querySelectorAll('button').forEach((button) => {
        button.classList.toggle(
          'is-selected',
          button.dataset.value === value
        );
      });
    };

    const locationLabel = () => {
      if (state.location === 'remote') {
        return 'Atendimento remoto';
      }

      if (state.location === 'other') {
        const street =
          $('[data-street]')?.value.trim() || '';

        const number =
          $('[data-number]')?.value.trim() || '';

        return street
          ? `${street}${number ? `, ${number}` : ''}`
          : 'Outro endereço informado';
      }

      return 'Jardim Europa, São Paulo — SP';
    };

    const fullAddressLabel = () => {
      if (state.location === 'remote') {
        return 'Atendimento remoto';
      }

      if (state.location === 'saved') {
        return 'Rua das Palmeiras, 248 • Apto 64 • Jardim Europa, São Paulo — SP';
      }

      const street =
        $('[data-street]')?.value.trim() ||
        'Novo endereço';

      const number =
        $('[data-number]')?.value.trim() ||
        '';

      const complement =
        $('[data-complement]')?.value.trim() ||
        '';

      return [
        street + (number ? `, ${number}` : ''),
        complement
      ]
        .filter(Boolean)
        .join(' • ');
    };

    const budgetLabel = (separator = ' — ') => {
      if (state.budgetMode === 'open') {
        return 'Aberto a propostas';
      }

      return (
        `R$ ${money(budgetMin?.value)}` +
        `${separator}` +
        `R$ ${money(budgetMax?.value)}`
      );
    };

    const updateProgress = () => {
      const progressText = $('[data-progress-text]');
      const progressBar = $('[data-progress-bar]');

      const checks = [
        state.categoryId,
        title?.value.trim().length >= 5,
        description?.value.trim().length >= 20,
        state.location,
        state.urgency,
        state.budgetMode
      ];

      const completed =
        checks.filter(Boolean).length;

      const progress = Math.round(
        (completed / checks.length) * 100
      );

      if (progressText) {
        progressText.textContent = `${progress}%`;
      }

      if (progressBar) {
        progressBar.style.width = `${progress}%`;
      }
    };

    const updateSummary = () => {
      const summaryCategory =
        $('[data-summary-category]');

      const summaryIcon =
        $('[data-summary-icon]');

      const summaryTitle =
        $('[data-summary-title]');

      const summaryType =
        $('[data-summary-type]');

      const summaryLocation =
        $('[data-summary-location]');

      const summarySchedule =
        $('[data-summary-schedule]');

      const summaryBudget =
        $('[data-summary-budget]');

      const summaryFiles =
        $('[data-summary-files]');

      if (summaryCategory) {
        summaryCategory.textContent = state.category;
      }

      if (summaryIcon) {
        summaryIcon.setAttribute(
          'href',
          `#mda-sr-i-${state.categoryIcon}`
        );
      }

      if (summaryTitle) {
        summaryTitle.textContent =
          title?.value.trim() ||
          'Título da solicitação';
      }

      if (summaryType) {
        summaryType.textContent =
          state.serviceType;
      }

      if (summaryLocation) {
        summaryLocation.textContent =
          locationLabel();
      }

      if (summarySchedule) {
        summarySchedule.textContent =
          `${state.urgency} • ${state.period}`;
      }

      if (summaryBudget) {
        summaryBudget.textContent =
          budgetLabel();
      }

      if (summaryFiles) {
        summaryFiles.textContent =
          state.files.length
            ? `${state.files.length} arquivo(s)`
            : 'Nenhum arquivo';
      }

      updateProgress();
    };

    const updateReview = () => {
      const reviewCategory =
        $('[data-review-category]');

      const reviewTitle =
        $('[data-review-title]');

      const reviewDescription =
        $('[data-review-description]');

      const reviewFiles =
        $('[data-review-files]');

      const reviewAddress =
        $('[data-review-address]');

      const reviewUrgency =
        $('[data-review-urgency]');

      const reviewPeriod =
        $('[data-review-period]');

      const reviewBudget =
        $('[data-review-budget]');

      if (reviewCategory) {
        reviewCategory.textContent =
          `${state.category} • ${state.serviceType}`;
      }

      if (reviewTitle) {
        reviewTitle.textContent =
          title?.value.trim() || '';
      }

      if (reviewDescription) {
        reviewDescription.textContent =
          description?.value.trim() || '';
      }

      if (reviewFiles) {
        reviewFiles.textContent =
          state.files.length
            ? `${state.files.length} arquivo(s)`
            : 'Nenhum arquivo';
      }

      if (reviewAddress) {
        reviewAddress.textContent =
          fullAddressLabel();
      }

      if (reviewUrgency) {
        reviewUrgency.textContent =
          state.urgency;
      }

      if (reviewPeriod) {
        reviewPeriod.textContent =
          state.period;
      }

      if (reviewBudget) {
        reviewBudget.textContent =
          budgetLabel(' a ');
      }
    };

    const showStep = (number, scroll = true) => {
      state.step = Math.max(
        1,
        Math.min(4, number)
      );

      state.maxStep = Math.max(
        state.maxStep,
        state.step
      );

      $$('[data-panel]').forEach((panel) => {
        panel.hidden =
          Number(panel.dataset.panel) !== state.step;
      });

      $$('[data-step-button]').forEach((button) => {
        const buttonStep =
          Number(button.dataset.stepButton);

        button.classList.toggle(
          'is-current',
          buttonStep === state.step
        );

        button.classList.toggle(
          'is-complete',
          buttonStep < state.step
        );

        button.disabled =
          buttonStep > state.maxStep;

        button.toggleAttribute(
          'aria-current',
          buttonStep === state.step
        );

        const numberElement =
          button.querySelector(
            '.mda-sr__step-number'
          );

        if (numberElement) {
          numberElement.textContent =
            buttonStep < state.step
              ? '✓'
              : String(buttonStep);
        }
      });

      if (previousButton) {
        previousButton.hidden =
          state.step === 1;
      }

      if (nextButton) {
        nextButton.hidden =
          state.step === 4;
      }

      if (publishButton) {
        publishButton.hidden =
          state.step !== 4;

        publishButton.disabled =
          !terms?.checked;
      }

      if (state.step === 4) {
        updateReview();
      }

      clearNotice();

      if (scroll) {
        root.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    };

    const validateStep = () => {
      if (state.step === 1) {
        const invalidCategory =
          !state.categoryId;

        const invalidTitle =
          !title ||
          title.value.trim().length < 5;

        const invalidDescription =
          !description ||
          description.value.trim().length < 20;

        if (
          invalidCategory ||
          invalidTitle ||
          invalidDescription
        ) {
          showNotice(
            'Preencha a categoria, o título e uma descrição com pelo menos 20 caracteres.'
          );

          return false;
        }
      }

      if (
        state.step === 2 &&
        state.location === 'other'
      ) {
        const required = [
          $('[data-cep]'),
          $('[data-street]'),
          $('[data-number]')
        ];

        const missing = required.some(
          (field) =>
            !field ||
            !field.value.trim()
        );

        if (missing) {
          showNotice(
            'Informe CEP, logradouro e número do novo endereço.'
          );

          return false;
        }
      }

      if (
        state.step === 3 &&
        state.budgetMode === 'range'
      ) {
        const minimum =
          Number(budgetMin?.value);

        const maximum =
          Number(budgetMax?.value);

        if (
          !minimum ||
          !maximum ||
          minimum > maximum
        ) {
          showNotice(
            'Informe uma faixa válida, com o valor mínimo menor que o máximo.'
          );

          return false;
        }
      }

      return true;
    };

    const syncFiles = () => {
      if (
        !filesInput ||
        typeof DataTransfer === 'undefined'
      ) {
        return;
      }

      const transfer = new DataTransfer();

      state.files.forEach((file) => {
        transfer.items.add(file);
      });

      filesInput.files = transfer.files;
    };

    const renderFiles = () => {
      if (!fileList) return;

      fileList.replaceChildren();
      fileList.hidden =
        state.files.length === 0;

      state.files.forEach((file, index) => {
        const row =
          document.createElement('div');

        const icon =
          document.createElement('span');

        icon.innerHTML =
          '<svg><use href="#mda-sr-i-file"></use></svg>';

        const information =
          document.createElement('span');

        const name =
          document.createElement('strong');

        name.textContent = file.name;

        const status =
          document.createElement('small');

        status.textContent =
          'Pronto para enviar';

        information.append(name, status);

        const remove =
          document.createElement('button');

        remove.type = 'button';

        remove.setAttribute(
          'aria-label',
          `Remover ${file.name}`
        );

        remove.innerHTML =
          '<svg><use href="#mda-sr-i-trash"></use></svg>';

        remove.addEventListener('click', () => {
          state.files.splice(index, 1);

          syncFiles();
          renderFiles();
          updateSummary();
        });

        row.append(
          icon,
          information,
          remove
        );

        fileList.append(row);
      });
    };

    /*
     * NAVEGAÇÃO PELOS INDICADORES DAS ETAPAS
     */
    $$('[data-step-button]').forEach((button) => {
      button.addEventListener('click', () => {
        const number =
          Number(button.dataset.stepButton);

        if (number <= state.maxStep) {
          showStep(number);
        }
      });
    });

    /*
     * SELEÇÃO DAS CATEGORIAS
     */
    $$(
      '[data-categories] .mda-sr__category'
    ).forEach((button) => {
      const initiallySelected =
        button.classList.contains('is-selected');

      button.setAttribute(
        'aria-pressed',
        initiallySelected ? 'true' : 'false'
      );

      button.addEventListener('click', () => {
        state.categoryId =
          button.dataset.id || '';

        state.category =
          button.dataset.name ||
          'Categoria';

        state.categoryIcon =
          button.dataset.icon ||
          'service';

        if (categoryInput) {
          categoryInput.value =
            state.categoryId;
        }

        $$(
          '[data-categories] .mda-sr__category'
        ).forEach((category) => {
          const selected =
            category === button;

          category.classList.toggle(
            'is-selected',
            selected
          );

          category.setAttribute(
            'aria-pressed',
            selected ? 'true' : 'false'
          );

          const check =
            category.querySelector('i');

          if (check) {
            check.textContent =
              selected ? '✓' : '';
          }
        });

        if (categoryInput) {
          categoryInput.dispatchEvent(
            new Event('change', {
              bubbles: true
            })
          );
        }

        updateSummary();
      });
    });

    /*
     * TIPO DO SERVIÇO
     */
    $$(
      '[data-service-types] button'
    ).forEach((button) => {
      button.addEventListener('click', () => {
        state.serviceType =
          button.dataset.value || '';

        const input =
          $('[data-service-type-input]');

        if (input) {
          input.value =
            state.serviceType;
        }

        setSegmented(
          $('[data-service-types]'),
          state.serviceType
        );

        updateSummary();
      });
    });

    /*
     * LOCAL DO SERVIÇO
     */
    $$(
      '[data-locations] button'
    ).forEach((button) => {
      button.addEventListener('click', () => {
        state.location =
          button.dataset.value || '';

        const input =
          $('[data-location-input]');

        const otherAddress =
          $('[data-other-address]');

        if (input) {
          input.value =
            state.location;
        }

        setChoices(
          $('[data-locations]'),
          state.location
        );

        if (otherAddress) {
          otherAddress.hidden =
            state.location !== 'other';
        }

        updateSummary();
      });
    });

    /*
     * URGÊNCIA
     */
    $$(
      '[data-urgencies] button'
    ).forEach((button) => {
      button.addEventListener('click', () => {
        state.urgency =
          button.dataset.value || '';

        const input =
          $('[data-urgency-input]');

        const dateField =
          $('[data-date-field]');

        if (input) {
          input.value =
            state.urgency;
        }

        setChoices(
          $('[data-urgencies]'),
          state.urgency
        );

        if (dateField) {
          dateField.hidden =
            state.urgency !==
            'Escolher uma data';
        }

        updateSummary();
      });
    });

    /*
     * PERÍODO
     */
    $$(
      '[data-periods] button'
    ).forEach((button) => {
      button.addEventListener('click', () => {
        state.period =
          button.dataset.value || '';

        const input =
          $('[data-period-input]');

        if (input) {
          input.value =
            state.period;
        }

        setSegmented(
          $('[data-periods]'),
          state.period
        );

        updateSummary();
      });
    });

    /*
     * TIPO DE ORÇAMENTO
     */
    $$(
      '[data-budget-options] button'
    ).forEach((button) => {
      button.addEventListener('click', () => {
        state.budgetMode =
          button.dataset.value || '';

        const input =
          $('[data-budget-mode-input]');

        const fields =
          $('[data-budget-fields]');

        if (input) {
          input.value =
            state.budgetMode;
        }

        setChoices(
          $('[data-budget-options]'),
          state.budgetMode
        );

        if (fields) {
          fields.hidden =
            state.budgetMode !== 'range';
        }

        updateSummary();
      });
    });

    /*
     * CONTADOR DO TÍTULO
     */
    if (title) {
      title.addEventListener('input', () => {
        const counter =
          $('[data-title-count]');

        if (counter) {
          counter.textContent =
            `${title.value.length}/80`;
        }

        updateSummary();
      });
    }

    /*
     * CONTADOR DA DESCRIÇÃO
     */
    if (description) {
      description.addEventListener(
        'input',
        () => {
          const counter =
            $('[data-description-count]');

          if (counter) {
            counter.textContent =
              `${description.value.length}/600`;
          }

          updateSummary();
        }
      );
    }

    /*
     * CAMPOS DE ORÇAMENTO
     */
    [budgetMin, budgetMax]
      .filter(Boolean)
      .forEach((input) => {
        input.addEventListener('input', () => {
          input.value =
            input.value.replace(/\D/g, '');

          updateSummary();
        });
      });

    /*
     * CAMPOS DO ENDEREÇO
     */
    [
      $('[data-street]'),
      $('[data-number]'),
      $('[data-complement]')
    ]
      .filter(Boolean)
      .forEach((input) => {
        input.addEventListener(
          'input',
          updateSummary
        );
      });

    /*
     * MÁSCARA DO CEP
     */
    const cepInput = $('[data-cep]');

    if (cepInput) {
      cepInput.addEventListener(
        'input',
        (event) => {
          let value =
            event.target.value
              .replace(/\D/g, '')
              .slice(0, 8);

          if (value.length > 5) {
            value =
              `${value.slice(0, 5)}-` +
              `${value.slice(5)}`;
          }

          event.target.value = value;
        }
      );
    }

    /*
     * UPLOAD DOS ARQUIVOS
     */
    if (filesInput) {
      filesInput.addEventListener(
        'change',
        () => {
          const selected =
            Array.from(
              filesInput.files || []
            );

          state.files = selected
            .filter(
              (file) =>
                file.size <=
                10 * 1024 * 1024
            )
            .slice(0, 5);

          if (
            selected.length !==
            state.files.length
          ) {
            showNotice(
              'Alguns arquivos foram ignorados por excederem o limite de quantidade ou tamanho.'
            );
          }

          syncFiles();
          renderFiles();
          updateSummary();
        }
      );
    }

    /*
     * BOTÃO AVANÇAR
     */
    if (nextButton) {
      nextButton.addEventListener(
        'click',
        () => {
          if (validateStep()) {
            showStep(state.step + 1);
          }
        }
      );
    }

    /*
     * BOTÃO VOLTAR UMA ETAPA
     */
    if (previousButton) {
      previousButton.addEventListener(
        'click',
        () => {
          showStep(state.step - 1);
        }
      );
    }

    /*
     * BOTÕES EDITAR DA REVISÃO
     */
    $$('[data-edit]').forEach((button) => {
      button.addEventListener('click', () => {
        showStep(
          Number(button.dataset.edit)
        );
      });
    });

    /*
     * SALVAR RASCUNHO
     */
    const draftButton = $('[data-draft]');

    if (draftButton) {
      draftButton.addEventListener(
        'click',
        () => {
          const draft = {
            categoryId: state.categoryId,
            category: state.category,
            serviceType: state.serviceType,

            title:
              title?.value || '',

            description:
              description?.value || '',

            location: state.location,
            urgency: state.urgency,
            period: state.period,

            budgetMode:
              state.budgetMode,

            budgetMin:
              budgetMin?.value || '',

            budgetMax:
              budgetMax?.value || '',

            savedAt:
              new Date().toISOString()
          };

          localStorage.setItem(
            'mda-solicitacao-rascunho',
            JSON.stringify(draft)
          );

          showNotice(
            'Rascunho salvo neste dispositivo.',
            true
          );
        }
      );
    }

    /*
     * ACEITE DOS TERMOS
     */
    if (terms && publishButton) {
      terms.addEventListener(
        'change',
        () => {
          publishButton.disabled =
            !terms.checked;
        }
      );
    }

    /*
     * ENVIO DO FORMULÁRIO
     */
    if (form) {
      form.addEventListener(
        'submit',
        (event) => {
          if (
            state.step !== 4 ||
            !terms?.checked
          ) {
            event.preventDefault();

            showNotice(
              'Revise a solicitação e aceite os termos antes de publicar.'
            );

            return;
          }

          updateReview();

          /*
           * No modo de demonstração, o formulário
           * não é enviado e o modal é aberto.
           *
           * Para enviar ao Laravel, coloque:
           *
           * data-submit-real="true"
           * method="POST"
           * action="{{ route('solicitacoes.store') }}"
           *
           * e adicione @csrf dentro do form.
           */
          if (
            form.dataset.submitReal !== 'true'
          ) {
            event.preventDefault();

            if (modal) {
              modal.hidden = false;

              document.body.style.overflow =
                'hidden';
            }
          }
        }
      );
    }

    /*
     * FECHAR MODAL
     */
    $$('[data-close]').forEach((button) => {
      button.addEventListener('click', () => {
        if (!modal) return;

        modal.hidden = true;
        document.body.style.overflow = '';
      });
    });

    /*
     * FECHAR MODAL CLICANDO FORA
     */
    if (modal) {
      modal.addEventListener(
        'click',
        (event) => {
          if (event.target === modal) {
            modal.hidden = true;
            document.body.style.overflow =
              '';
          }
        }
      );
    }

    /*
     * BOTÃO VOLTAR DA PÁGINA
     */
    const backButton = $('[data-back]');

    if (backButton) {
      backButton.addEventListener(
        'click',
        () => {
          if (window.history.length > 1) {
            window.history.back();
            return;
          }

          root.dispatchEvent(
            new CustomEvent('mda:back', {
              bubbles: true
            })
          );
        }
      );
    }

    /*
     * INICIALIZAÇÃO DA TELA
     */
    const titleCounter =
      $('[data-title-count]');

    const descriptionCounter =
      $('[data-description-count]');

    if (titleCounter && title) {
      titleCounter.textContent =
        `${title.value.length}/80`;
    }

    if (
      descriptionCounter &&
      description
    ) {
      descriptionCounter.textContent =
        `${description.value.length}/600`;
    }

    updateSummary();
    showStep(1, false);
  };

  const start = () => {
    document
      .querySelectorAll('[data-mda-sr]')
      .forEach(initialize);
  };

  if (document.readyState === 'loading') {
    document.addEventListener(
      'DOMContentLoaded',
      start
    );
  } else {
    start();
  }
})();