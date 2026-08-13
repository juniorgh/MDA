(() => {
  'use strict';

  const VIEW_KEY = 'mda.servico.index.view';

  const normalize = (value = '') => value
    .toString()
    .normalize('NFD')
    .replace(/[\u0300-\u036f]/g, '')
    .toLowerCase()
    .trim();

  const initialize = (root) => {
    if (root.dataset.initialized === 'true') return;
    root.dataset.initialized = 'true';

    const $ = (selector) => root.querySelector(selector);
    const $$ = (selector) => Array.from(root.querySelectorAll(selector));
    const cardsContainer = $('[data-service-cards]');
    const cards = $$('[data-service-card]');
    const emptyState = $('[data-empty-state]');
    const pagination = $('[data-pagination]');
    const filterForm = $('[data-filter-form]');
    const filterFields = $('[data-filter-fields]');
    const filterToggle = $('[data-filter-toggle]');
    const searchInput = $('[data-search-input]');
    const clearSearchButton = $('[data-clear-search]');
    const categoryFilter = $('[data-category-filter]');
    const orderFilter = $('[data-order-filter]');
    const resultCount = $('[data-result-count]');
    const resultLabel = $('[data-result-label]');
    const modal = $('[data-confirm-modal]');
    const confirmButton = $('[data-confirm-submit]');
    const toast = $('[data-toast]');

    const state = {
      status: 'todos',
      category: 'todos',
      search: '',
      order: 'recentes',
      page: 1,
      pageSize: 4,
      selectedCard: null,
      confirmAction: null,
      modalOpener: null,
      toastTimer: null,
    };

    const availableCards = () => cards.filter((card) => card.dataset.removed !== 'true');

    const showToast = (message) => {
      const text = $('[data-toast-text]');
      if (!toast || !text) return;

      window.clearTimeout(state.toastTimer);
      text.textContent = message;
      toast.hidden = false;
      window.requestAnimationFrame(() => toast.classList.add('is-visible'));

      state.toastTimer = window.setTimeout(() => {
        toast.classList.remove('is-visible');
        window.setTimeout(() => { toast.hidden = true; }, 220);
      }, 3300);
    };

    const closeToast = () => {
      if (!toast) return;
      window.clearTimeout(state.toastTimer);
      toast.classList.remove('is-visible');
      window.setTimeout(() => { toast.hidden = true; }, 220);
    };

    const updateCounts = () => {
      const counts = availableCards().reduce((total, card) => {
        total.todos += 1;
        total[card.dataset.status] = (total[card.dataset.status] || 0) + 1;
        return total;
      }, { todos: 0 });

      $$('[data-stat]').forEach((element) => {
        element.textContent = counts[element.dataset.stat] || 0;
      });

      $$('[data-tab-count]').forEach((element) => {
        element.textContent = counts[element.dataset.tabCount] || 0;
      });
    };

    const getFilteredCards = () => {
      const filtered = availableCards().filter((card) => {
        const searchable = normalize([
          card.dataset.title,
          card.dataset.description,
          card.dataset.category,
        ].join(' '));

        const matchesStatus = state.status === 'todos' || card.dataset.status === state.status;
        const matchesCategory = state.category === 'todos' || card.dataset.category === state.category;
        const matchesSearch = !state.search || searchable.includes(normalize(state.search));

        return matchesStatus && matchesCategory && matchesSearch;
      });

      const number = (card, field) => Number(card.dataset[field] || 0);
      const date = (card) => new Date(`${card.dataset.date}T00:00:00`).getTime();

      return filtered.sort((first, second) => {
        if (state.order === 'antigos') return date(first) - date(second);
        if (state.order === 'maior_orcamento') return number(second, 'budget') - number(first, 'budget');
        if (state.order === 'mais_propostas') return number(second, 'proposals') - number(first, 'proposals');
        return date(second) - date(first);
      });
    };

    const createPageButton = (label, page, options = {}) => {
      const button = document.createElement('button');
      button.type = 'button';
      button.dataset.page = String(page);
      button.setAttribute('aria-label', options.ariaLabel || `Ir para a página ${page}`);
      button.innerHTML = label;

      if (options.current) {
        button.classList.add('is-current');
        button.setAttribute('aria-current', 'page');
      }

      if (options.disabled) button.disabled = true;
      return button;
    };

    const renderPagination = (totalPages) => {
      pagination.replaceChildren();
      if (totalPages <= 1) {
        pagination.hidden = true;
        return;
      }

      pagination.hidden = false;
      pagination.append(createPageButton(
        '<svg aria-hidden="true"><use href="#mda-si-i-chevron-left"></use></svg>',
        Math.max(1, state.page - 1),
        { ariaLabel: 'Página anterior', disabled: state.page === 1 },
      ));

      for (let page = 1; page <= totalPages; page += 1) {
        pagination.append(createPageButton(String(page), page, { current: page === state.page }));
      }

      pagination.append(createPageButton(
        '<svg aria-hidden="true"><use href="#mda-si-i-chevron-right"></use></svg>',
        Math.min(totalPages, state.page + 1),
        { ariaLabel: 'Próxima página', disabled: state.page === totalPages },
      ));
    };

    const render = ({ resetPage = false } = {}) => {
      if (resetPage) state.page = 1;

      const filtered = getFilteredCards();
      const totalPages = Math.max(1, Math.ceil(filtered.length / state.pageSize));
      state.page = Math.min(state.page, totalPages);

      const start = (state.page - 1) * state.pageSize;
      const visibleCards = filtered.slice(start, start + state.pageSize);

      cards.forEach((card) => { card.hidden = true; });
      visibleCards.forEach((card) => {
        card.hidden = false;
        cardsContainer.insertBefore(card, emptyState);
      });

      emptyState.hidden = filtered.length !== 0;
      resultCount.textContent = filtered.length;
      resultLabel.textContent = filtered.length === 1 ? 'serviço encontrado' : 'serviços encontrados';
      clearSearchButton.hidden = searchInput.value.length === 0;

      updateCounts();
      renderPagination(totalPages);
    };

    const clearFilters = () => {
      state.status = 'todos';
      state.category = 'todos';
      state.search = '';
      state.order = 'recentes';
      searchInput.value = '';
      categoryFilter.value = 'todos';
      orderFilter.value = 'recentes';

      $$('[data-status-tab]').forEach((tab) => {
        const active = tab.dataset.statusTab === 'todos';
        tab.classList.toggle('is-active', active);
        tab.setAttribute('aria-pressed', String(active));
      });

      render({ resetPage: true });
    };

    const setView = (view) => {
      const listView = view === 'list';
      root.classList.toggle('is-list-view', listView);

      $$('[data-view-button]').forEach((button) => {
        const active = button.dataset.viewButton === view;
        button.classList.toggle('is-active', active);
        button.setAttribute('aria-pressed', String(active));
      });

      try { window.localStorage.setItem(VIEW_KEY, view); } catch (_) { /* armazenamento opcional */ }
    };

    const closeModal = () => {
      if (!modal || modal.hidden) return;
      modal.hidden = true;
      document.body.style.removeProperty('overflow');
      state.selectedCard = null;
      state.confirmAction = null;
      state.modalOpener?.focus();
    };

    const openModal = (button) => {
      state.selectedCard = button.closest('[data-service-card]');
      state.confirmAction = button.dataset.confirmAction;
      state.modalOpener = button;

      $('[data-confirm-title-output]').textContent = button.dataset.confirmTitle || 'Confirmar ação?';
      $('[data-confirm-message-output]').textContent = button.dataset.confirmMessage || '';
      confirmButton.textContent = button.dataset.confirmLabel || 'Confirmar';

      modal.hidden = false;
      document.body.style.overflow = 'hidden';
      confirmButton.focus();
    };

    const confirmAction = () => {
      const card = state.selectedCard;
      if (!card) return;

      if (state.confirmAction === 'excluir') {
        card.dataset.removed = 'true';
        showToast('Rascunho removido somente desta demonstração.');
      }

      if (state.confirmAction === 'cancelar') {
        card.dataset.status = 'cancelado';
        const badge = card.querySelector('[data-status-badge]');
        badge.className = 'mda-si__status is-cancelled';
        badge.querySelector('b').textContent = 'Cancelado';
        card.querySelector('[data-confirm-action="cancelar"]')?.remove();
        showToast('Serviço alterado para cancelado nesta demonstração.');
      }

      closeModal();
      render();
    };

    filterForm.addEventListener('submit', (event) => {
      event.preventDefault();
      state.search = searchInput.value;
      state.category = categoryFilter.value;
      state.order = orderFilter.value;
      render({ resetPage: true });
    });

    let searchTimer;
    searchInput.addEventListener('input', () => {
      window.clearTimeout(searchTimer);
      clearSearchButton.hidden = searchInput.value.length === 0;
      searchTimer = window.setTimeout(() => {
        state.search = searchInput.value;
        render({ resetPage: true });
      }, 180);
    });

    clearSearchButton.addEventListener('click', () => {
      searchInput.value = '';
      state.search = '';
      searchInput.focus();
      render({ resetPage: true });
    });

    categoryFilter.addEventListener('change', () => {
      state.category = categoryFilter.value;
      render({ resetPage: true });
    });

    orderFilter.addEventListener('change', () => {
      state.order = orderFilter.value;
      render({ resetPage: true });
    });

    $$('[data-clear-filters], [data-empty-clear]').forEach((button) => {
      button.addEventListener('click', clearFilters);
    });

    $$('[data-status-tab]').forEach((tab) => {
      tab.addEventListener('click', () => {
        state.status = tab.dataset.statusTab;
        $$('[data-status-tab]').forEach((item) => {
          const active = item === tab;
          item.classList.toggle('is-active', active);
          item.setAttribute('aria-pressed', String(active));
        });
        render({ resetPage: true });
      });
    });

    $$('[data-view-button]').forEach((button) => {
      button.addEventListener('click', () => setView(button.dataset.viewButton));
    });

    filterToggle.addEventListener('click', () => {
      const open = filterFields.classList.toggle('is-open');
      filterToggle.setAttribute('aria-expanded', String(open));
    });

    pagination.addEventListener('click', (event) => {
      const button = event.target.closest('[data-page]');
      if (!button || button.disabled) return;
      state.page = Number(button.dataset.page);
      render();
      cardsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    root.addEventListener('click', (event) => {
      const demoButton = event.target.closest('[data-demo-message]');
      const confirmTrigger = event.target.closest('[data-confirm-action]');
      if (demoButton) showToast(demoButton.dataset.demoMessage);
      if (confirmTrigger) openModal(confirmTrigger);
    });

    $$('[data-confirm-close]').forEach((button) => button.addEventListener('click', closeModal));
    confirmButton.addEventListener('click', confirmAction);
    $('[data-toast-close]')?.addEventListener('click', closeToast);

    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') {
        closeModal();
        closeToast();
      }
    });

    let savedView = 'grid';
    try { savedView = window.localStorage.getItem(VIEW_KEY) || 'grid'; } catch (_) { /* armazenamento opcional */ }
    setView(savedView === 'list' ? 'list' : 'grid');
    render();
  };

  const start = () => document.querySelectorAll('[data-service-index]').forEach(initialize);

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', start, { once: true });
  } else {
    start();
  }
})();