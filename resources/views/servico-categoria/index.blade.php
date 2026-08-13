<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Demonstração estática da tela de serviços do MDA">
  <title>MDA — Meus serviços</title>

</head>
<body>
<section class="mda-sr mda-si" data-service-index>
    <svg class="mda-sr__sprite" aria-hidden="true" focusable="false">
        <symbol id="mda-si-i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
        <symbol id="mda-si-i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></symbol>
        <symbol id="mda-si-i-filter" viewBox="0 0 24 24"><path d="M4 6h16M7 12h10M10 18h4"/></symbol>
        <symbol id="mda-si-i-grid" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></symbol>
        <symbol id="mda-si-i-list" viewBox="0 0 24 24"><path d="M9 6h11M9 12h11M9 18h11"/><circle cx="4.5" cy="6" r=".7"/><circle cx="4.5" cy="12" r=".7"/><circle cx="4.5" cy="18" r=".7"/></symbol>
        <symbol id="mda-si-i-service" viewBox="0 0 24 24"><path d="M14.5 6.2a5 5 0 0 0-6.7 6.7L3 17.7 6.3 21l4.8-4.8a5 5 0 0 0 6.7-6.7l-3.1 3.1-3.3-.7-.7-3.3Z"/></symbol>
        <symbol id="mda-si-i-bolt" viewBox="0 0 24 24"><path d="M13 2 4.5 13H11l-1 9 8.5-12H12Z"/></symbol>
        <symbol id="mda-si-i-drop" viewBox="0 0 24 24"><path d="M12 2S5 10 5 15a7 7 0 0 0 14 0c0-5-7-13-7-13Z"/></symbol>
        <symbol id="mda-si-i-paint" viewBox="0 0 24 24"><path d="m14 4 6 6-9.5 9.5a2.1 2.1 0 0 1-3 0l-3-3a2.1 2.1 0 0 1 0-3Z"/><path d="m12 6 6 6"/></symbol>
        <symbol id="mda-si-i-hammer" viewBox="0 0 24 24"><path d="m14 6 4-4 4 4-4 4M16 8l-3 3M11 9l4 4-9 9-4-4Z"/></symbol>
        <symbol id="mda-si-i-spark" viewBox="0 0 24 24"><path d="m12 2 1.5 6.5L20 10l-6.5 1.5L12 18l-1.5-6.5L4 10l6.5-1.5Z"/></symbol>
        <symbol id="mda-si-i-snow" viewBox="0 0 24 24"><path d="M12 2v20M4.2 6.5l15.6 11M19.8 6.5l-15.6 11"/></symbol>
        <symbol id="mda-si-i-map" viewBox="0 0 24 24"><path d="M12 21s7-6.2 7-12A7 7 0 0 0 5 9c0 5.8 7 12 7 12Z"/><circle cx="12" cy="9" r="2.3"/></symbol>
        <symbol id="mda-si-i-wallet" viewBox="0 0 24 24"><path d="M4 6.5A2.5 2.5 0 0 1 6.5 4H18v16H6.5A2.5 2.5 0 0 1 4 17.5Z"/><path d="M4 8h14M15 12h6v5h-6a2.5 2.5 0 0 1 0-5Z"/></symbol>
        <symbol id="mda-si-i-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></symbol>
        <symbol id="mda-si-i-message" viewBox="0 0 24 24"><path d="M20 15a3 3 0 0 1-3 3H9l-5 3v-6a3 3 0 0 1-1-2.2V7a3 3 0 0 1 3-3h11a3 3 0 0 1 3 3Z"/></symbol>
        <symbol id="mda-si-i-eye" viewBox="0 0 24 24"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/></symbol>
        <symbol id="mda-si-i-edit" viewBox="0 0 24 24"><path d="M4 20h4L19 9l-4-4L4 16v4ZM13.5 6.5l4 4"/></symbol>
        <symbol id="mda-si-i-trash" viewBox="0 0 24 24"><path d="M4 7h16M9 7V4h6v3M7 7l1 14h8l1-14"/></symbol>
        <symbol id="mda-si-i-send" viewBox="0 0 24 24"><path d="m3 11 18-8-8 18-2-8-8-2Z"/><path d="m11 13 10-10"/></symbol>
        <symbol id="mda-si-i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
        <symbol id="mda-si-i-check" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></symbol>
        <symbol id="mda-si-i-x" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></symbol>
        <symbol id="mda-si-i-alert" viewBox="0 0 24 24"><path d="M12 3 2.8 20h18.4L12 3Z"/><path d="M12 9v5M12 17.5v.1"/></symbol>
        <symbol id="mda-si-i-chevron-left" viewBox="0 0 24 24"><path d="m15 18-6-6 6-6"/></symbol>
        <symbol id="mda-si-i-chevron-right" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></symbol>
    </svg>

    <header class="mda-sr__heading mda-si__heading">
        <div>
            <span class="mda-si__eyebrow">PAINEL DO CONTRATANTE</span>
            <h1>Meus serviços</h1>
            <p>Acompanhe solicitações, propostas e serviços em execução.</p>
        </div>

        <button type="button" class="mda-sr__button is-primary mda-si__create" data-demo-message="Aqui você direcionará o usuário para a tela de solicitação.">
            <svg><use href="#mda-si-i-plus"></use></svg>
            Solicitar serviço
        </button>
    </header>

    <div class="mda-si__stats" aria-label="Resumo dos serviços">
        <article><span><svg><use href="#mda-si-i-service"></use></svg></span><div><small>Total de serviços</small><strong data-stat="todos">6</strong></div></article>
        <article><span><svg><use href="#mda-si-i-send"></use></svg></span><div><small>Publicados</small><strong data-stat="publicado">2</strong></div></article>
        <article><span><svg><use href="#mda-si-i-clock"></use></svg></span><div><small>Em andamento</small><strong data-stat="em_andamento">1</strong></div></article>
        <article><span><svg><use href="#mda-si-i-check"></use></svg></span><div><small>Concluídos</small><strong data-stat="concluido">1</strong></div></article>
    </div>

    <section class="mda-si__workspace">
        <form class="mda-si__filters" data-filter-form novalidate>
            <div class="mda-si__search">
                <svg><use href="#mda-si-i-search"></use></svg>
                <input type="search" name="busca" placeholder="Buscar por título, descrição ou categoria..." aria-label="Buscar serviços" autocomplete="off" data-search-input>
                <button type="button" data-clear-search aria-label="Limpar pesquisa" hidden>×</button>
            </div>

            <button class="mda-si__filter-toggle" type="button" data-filter-toggle aria-expanded="false">
                <svg><use href="#mda-si-i-filter"></use></svg>Filtros
            </button>

            <div class="mda-si__filter-fields" data-filter-fields>
                <label>
                    <span>Categoria</span>
                    <select name="categoria" data-category-filter>
                        <option value="todos">Todas</option>
                        <option value="eletrica">Elétrica</option>
                        <option value="hidraulica">Hidráulica</option>
                        <option value="pintura">Pintura</option>
                        <option value="montagem">Montagem</option>
                        <option value="limpeza">Limpeza</option>
                        <option value="climatizacao">Climatização</option>
                    </select>
                </label>

                <label>
                    <span>Ordenar</span>
                    <select name="ordem" data-order-filter>
                        <option value="recentes">Mais recentes</option>
                        <option value="antigos">Mais antigos</option>
                        <option value="maior_orcamento">Maior orçamento</option>
                        <option value="mais_propostas">Mais propostas</option>
                    </select>
                </label>

                <button class="mda-si__apply" type="submit">Aplicar</button>
                <button class="mda-si__clear" type="button" data-clear-filters>Limpar</button>
            </div>
        </form>

        <div class="mda-si__tabs-row">
            <nav class="mda-si__tabs" aria-label="Situação dos serviços">
                <button type="button" class="is-active" data-status-tab="todos" aria-pressed="true">Todos <span data-tab-count="todos">6</span></button>
                <button type="button" data-status-tab="rascunho" aria-pressed="false">Rascunhos <span data-tab-count="rascunho">1</span></button>
                <button type="button" data-status-tab="publicado" aria-pressed="false">Publicados <span data-tab-count="publicado">2</span></button>
                <button type="button" data-status-tab="em_andamento" aria-pressed="false">Em andamento <span data-tab-count="em_andamento">1</span></button>
                <button type="button" data-status-tab="concluido" aria-pressed="false">Concluídos <span data-tab-count="concluido">1</span></button>
                <button type="button" data-status-tab="cancelado" aria-pressed="false">Cancelados <span data-tab-count="cancelado">1</span></button>
            </nav>

            <div class="mda-si__view-switch" aria-label="Formato da listagem">
                <button type="button" class="is-active" data-view-button="grid" aria-label="Exibir em grade" aria-pressed="true"><svg><use href="#mda-si-i-grid"></use></svg></button>
                <button type="button" data-view-button="list" aria-label="Exibir em lista" aria-pressed="false"><svg><use href="#mda-si-i-list"></use></svg></button>
            </div>
        </div>

        <div class="mda-si__result-info">
            <p><strong data-result-count>6</strong> <span data-result-label>serviços encontrados</span></p>
        </div>

        <div class="mda-si__cards" data-service-cards>
            <!-- EXEMPLO 1: RASCUNHO -->
            <article class="mda-si__card" data-service-card data-title="Instalação de luminárias e novas tomadas" data-description="Instalação de seis luminárias e criação de quatro pontos de tomada no apartamento." data-category="eletrica" data-status="rascunho" data-date="2026-08-12" data-budget="650" data-proposals="0">
                <header class="mda-si__card-header">
                    <div class="mda-si__category"><span><svg><use href="#mda-si-i-bolt"></use></svg></span><div><small>Elétrica</small><strong>Instalação</strong></div></div>
                    <span class="mda-si__status is-draft" data-status-badge><i></i><b>Rascunho</b></span>
                </header>

                <div class="mda-si__card-body">
                    <button type="button" class="mda-si__title" data-demo-message="Aqui será aberta a tela de detalhes deste serviço.">Instalação de luminárias e novas tomadas</button>
                    <p>Instalação de seis luminárias e criação de quatro pontos de tomada no apartamento.</p>
                    <div class="mda-si__metadata">
                        <span><svg><use href="#mda-si-i-map"></use></svg>Jardim Europa, São Paulo — SP</span>
                        <span><svg><use href="#mda-si-i-wallet"></use></svg>R$ 450,00 a R$ 650,00</span>
                        <span><svg><use href="#mda-si-i-calendar"></use></svg>Criado em 12/08/2026</span>
                    </div>
                </div>

                <footer class="mda-si__card-footer">
                    <button type="button" class="mda-si__proposals" data-demo-message="Este rascunho ainda não recebe propostas."><span><svg><use href="#mda-si-i-message"></use></svg></span><div><strong>0</strong><small>propostas recebidas</small></div></button>
                    <div class="mda-si__actions">
                        <button type="button" class="mda-si__action" data-demo-message="Aqui será aberta a edição do rascunho."><svg><use href="#mda-si-i-edit"></use></svg><span>Editar</span></button>
                        <button type="button" class="mda-si__action is-primary" data-demo-message="Aqui você executará a publicação do serviço."><svg><use href="#mda-si-i-send"></use></svg><span>Publicar</span></button>
                        <button type="button" class="mda-si__action is-danger" data-confirm-action="excluir" data-confirm-title="Excluir rascunho?" data-confirm-message="O exemplo será removido desta tela até que a página seja recarregada." data-confirm-label="Excluir"><svg><use href="#mda-si-i-trash"></use></svg><span>Excluir</span></button>
                    </div>
                </footer>
            </article>

            <!-- EXEMPLO 2: PUBLICADO -->
            <article class="mda-si__card" data-service-card data-title="Reparo em vazamento na cozinha" data-description="Vazamento abaixo da pia, com necessidade de avaliação da tubulação e troca do sifão." data-category="hidraulica" data-status="publicado" data-date="2026-08-11" data-budget="900" data-proposals="4">
                <header class="mda-si__card-header">
                    <div class="mda-si__category"><span><svg><use href="#mda-si-i-drop"></use></svg></span><div><small>Hidráulica</small><strong>Reparo</strong></div></div>
                    <span class="mda-si__status is-published" data-status-badge><i></i><b>Publicado</b></span>
                </header>

                <div class="mda-si__card-body">
                    <button type="button" class="mda-si__title" data-demo-message="Aqui será aberta a tela de detalhes deste serviço.">Reparo em vazamento na cozinha</button>
                    <p>Vazamento abaixo da pia, com necessidade de avaliação da tubulação e troca do sifão.</p>
                    <div class="mda-si__metadata">
                        <span><svg><use href="#mda-si-i-map"></use></svg>Centro, Curitiba — PR</span>
                        <span><svg><use href="#mda-si-i-wallet"></use></svg>R$ 500,00 a R$ 900,00</span>
                        <span><svg><use href="#mda-si-i-calendar"></use></svg>Publicado em 11/08/2026</span>
                    </div>
                </div>

                <footer class="mda-si__card-footer">
                    <button type="button" class="mda-si__proposals has-proposals" data-demo-message="Aqui será aberta a área com as propostas recebidas."><span><svg><use href="#mda-si-i-message"></use></svg></span><div><strong>4</strong><small>propostas recebidas</small></div></button>
                    <div class="mda-si__actions">
                        <button type="button" class="mda-si__action" data-demo-message="Aqui será aberta a tela de detalhes deste serviço."><svg><use href="#mda-si-i-eye"></use></svg><span>Visualizar</span></button>
                        <button type="button" class="mda-si__action is-danger" data-confirm-action="cancelar" data-confirm-title="Cancelar serviço?" data-confirm-message="O exemplo passará para a situação cancelado até que a página seja recarregada." data-confirm-label="Cancelar serviço"><svg><use href="#mda-si-i-x"></use></svg><span>Cancelar</span></button>
                    </div>
                </footer>
            </article>

            <!-- EXEMPLO 3: EM ANDAMENTO -->
            <article class="mda-si__card" data-service-card data-title="Instalação de ar-condicionado split" data-description="Instalação de aparelho de 12.000 BTUs, incluindo suporte externo e acabamento." data-category="climatizacao" data-status="em_andamento" data-date="2026-08-08" data-budget="1800" data-proposals="7">
                <header class="mda-si__card-header">
                    <div class="mda-si__category"><span><svg><use href="#mda-si-i-snow"></use></svg></span><div><small>Climatização</small><strong>Instalação</strong></div></div>
                    <span class="mda-si__status is-progress" data-status-badge><i></i><b>Em andamento</b></span>
                </header>

                <div class="mda-si__card-body">
                    <button type="button" class="mda-si__title" data-demo-message="Aqui será aberto o acompanhamento do serviço.">Instalação de ar-condicionado split</button>
                    <p>Instalação de aparelho de 12.000 BTUs, incluindo suporte externo e acabamento.</p>
                    <div class="mda-si__metadata">
                        <span><svg><use href="#mda-si-i-map"></use></svg>Moema, São Paulo — SP</span>
                        <span><svg><use href="#mda-si-i-wallet"></use></svg>Proposta aceita: R$ 1.650,00</span>
                        <span><svg><use href="#mda-si-i-calendar"></use></svg>Iniciado em 08/08/2026</span>
                    </div>
                </div>

                <footer class="mda-si__card-footer">
                    <button type="button" class="mda-si__proposals has-proposals" data-demo-message="Sete propostas foram recebidas; uma delas foi aceita."><span><svg><use href="#mda-si-i-message"></use></svg></span><div><strong>7</strong><small>propostas recebidas</small></div></button>
                    <div class="mda-si__actions"><button type="button" class="mda-si__action is-primary" data-demo-message="Aqui será aberta a evolução e o histórico do serviço."><svg><use href="#mda-si-i-clock"></use></svg><span>Acompanhar</span></button></div>
                </footer>
            </article>

            <!-- EXEMPLO 4: CONCLUÍDO -->
            <article class="mda-si__card" data-service-card data-title="Pintura da sala e corredor" data-description="Preparação das paredes, correção de pequenas fissuras e aplicação de duas demãos." data-category="pintura" data-status="concluido" data-date="2026-07-28" data-budget="2400" data-proposals="5">
                <header class="mda-si__card-header">
                    <div class="mda-si__category"><span><svg><use href="#mda-si-i-paint"></use></svg></span><div><small>Pintura</small><strong>Manutenção</strong></div></div>
                    <span class="mda-si__status is-completed" data-status-badge><i></i><b>Concluído</b></span>
                </header>

                <div class="mda-si__card-body">
                    <button type="button" class="mda-si__title" data-demo-message="Aqui será aberta a tela de detalhes deste serviço.">Pintura da sala e corredor</button>
                    <p>Preparação das paredes, correção de pequenas fissuras e aplicação de duas demãos.</p>
                    <div class="mda-si__metadata">
                        <span><svg><use href="#mda-si-i-map"></use></svg>Asa Sul, Brasília — DF</span>
                        <span><svg><use href="#mda-si-i-wallet"></use></svg>Valor final: R$ 2.200,00</span>
                        <span><svg><use href="#mda-si-i-calendar"></use></svg>Concluído em 28/07/2026</span>
                    </div>
                </div>

                <footer class="mda-si__card-footer">
                    <button type="button" class="mda-si__proposals has-proposals" data-demo-message="Aqui poderão ser consultadas as propostas anteriores."><span><svg><use href="#mda-si-i-message"></use></svg></span><div><strong>5</strong><small>propostas recebidas</small></div></button>
                    <div class="mda-si__actions">
                        <button type="button" class="mda-si__action" data-demo-message="Aqui será aberta a tela de detalhes deste serviço."><svg><use href="#mda-si-i-eye"></use></svg><span>Visualizar</span></button>
                        <button type="button" class="mda-si__action is-primary" data-demo-message="Aqui será aberta a avaliação do prestador."><svg><use href="#mda-si-i-check"></use></svg><span>Avaliar</span></button>
                    </div>
                </footer>
            </article>

            <!-- EXEMPLO 5: CANCELADO -->
            <article class="mda-si__card" data-service-card data-title="Montagem de guarda-roupa" data-description="Montagem de guarda-roupa de seis portas no quarto principal." data-category="montagem" data-status="cancelado" data-date="2026-07-20" data-budget="500" data-proposals="3">
                <header class="mda-si__card-header">
                    <div class="mda-si__category"><span><svg><use href="#mda-si-i-hammer"></use></svg></span><div><small>Montagem</small><strong>Instalação</strong></div></div>
                    <span class="mda-si__status is-cancelled" data-status-badge><i></i><b>Cancelado</b></span>
                </header>

                <div class="mda-si__card-body">
                    <button type="button" class="mda-si__title" data-demo-message="Aqui será aberta a consulta do serviço cancelado.">Montagem de guarda-roupa</button>
                    <p>Montagem de guarda-roupa de seis portas no quarto principal.</p>
                    <div class="mda-si__metadata">
                        <span><svg><use href="#mda-si-i-map"></use></svg>Boa Viagem, Recife — PE</span>
                        <span><svg><use href="#mda-si-i-wallet"></use></svg>R$ 350,00 a R$ 500,00</span>
                        <span><svg><use href="#mda-si-i-calendar"></use></svg>Cancelado em 20/07/2026</span>
                    </div>
                </div>

                <footer class="mda-si__card-footer">
                    <button type="button" class="mda-si__proposals has-proposals" data-demo-message="Aqui poderão ser consultadas as propostas anteriores."><span><svg><use href="#mda-si-i-message"></use></svg></span><div><strong>3</strong><small>propostas recebidas</small></div></button>
                    <div class="mda-si__actions"><button type="button" class="mda-si__action" data-demo-message="Aqui será aberta a consulta do serviço cancelado."><svg><use href="#mda-si-i-eye"></use></svg><span>Visualizar</span></button></div>
                </footer>
            </article>

            <!-- EXEMPLO 6: PUBLICADO -->
            <article class="mda-si__card" data-service-card data-title="Limpeza completa após mudança" data-description="Limpeza pesada de apartamento vazio com três quartos e duas áreas externas." data-category="limpeza" data-status="publicado" data-date="2026-08-10" data-budget="750" data-proposals="2">
                <header class="mda-si__card-header">
                    <div class="mda-si__category"><span><svg><use href="#mda-si-i-spark"></use></svg></span><div><small>Limpeza</small><strong>Serviço completo</strong></div></div>
                    <span class="mda-si__status is-published" data-status-badge><i></i><b>Publicado</b></span>
                </header>

                <div class="mda-si__card-body">
                    <button type="button" class="mda-si__title" data-demo-message="Aqui será aberta a tela de detalhes deste serviço.">Limpeza completa após mudança</button>
                    <p>Limpeza pesada de apartamento vazio com três quartos e duas áreas externas.</p>
                    <div class="mda-si__metadata">
                        <span><svg><use href="#mda-si-i-map"></use></svg>Funcionários, Belo Horizonte — MG</span>
                        <span><svg><use href="#mda-si-i-wallet"></use></svg>Aberto a propostas</span>
                        <span><svg><use href="#mda-si-i-calendar"></use></svg>Publicado em 10/08/2026</span>
                    </div>
                </div>

                <footer class="mda-si__card-footer">
                    <button type="button" class="mda-si__proposals has-proposals" data-demo-message="Aqui será aberta a área com as propostas recebidas."><span><svg><use href="#mda-si-i-message"></use></svg></span><div><strong>2</strong><small>propostas recebidas</small></div></button>
                    <div class="mda-si__actions">
                        <button type="button" class="mda-si__action" data-demo-message="Aqui será aberta a tela de detalhes deste serviço."><svg><use href="#mda-si-i-eye"></use></svg><span>Visualizar</span></button>
                        <button type="button" class="mda-si__action is-danger" data-confirm-action="cancelar" data-confirm-title="Cancelar serviço?" data-confirm-message="O exemplo passará para a situação cancelado até que a página seja recarregada." data-confirm-label="Cancelar serviço"><svg><use href="#mda-si-i-x"></use></svg><span>Cancelar</span></button>
                    </div>
                </footer>
            </article>

            <div class="mda-si__empty" data-empty-state hidden>
                <span><svg><use href="#mda-si-i-search"></use></svg></span>
                <h2>Nenhum serviço encontrado</h2>
                <p>Altere a pesquisa, a categoria ou a situação selecionada.</p>
                <button type="button" class="mda-sr__button is-primary" data-empty-clear>Limpar filtros</button>
            </div>
        </div>

        <nav class="mda-si__pagination" data-pagination aria-label="Paginação da demonstração"></nav>
    </section>

    <div class="mda-si__modal" data-confirm-modal hidden role="dialog" aria-modal="true" aria-labelledby="mda-si-confirm-title">
        <button type="button" class="mda-si__modal-backdrop" data-confirm-close tabindex="-1" aria-label="Fechar confirmação"></button>
        <div class="mda-si__modal-card">
            <button type="button" class="mda-si__modal-close" data-confirm-close aria-label="Fechar">×</button>
            <span class="mda-si__modal-icon"><svg><use href="#mda-si-i-alert"></use></svg></span>
            <h2 id="mda-si-confirm-title" data-confirm-title-output>Confirmar ação?</h2>
            <p data-confirm-message-output></p>
            <div>
                <button type="button" class="mda-sr__button is-ghost" data-confirm-close>Voltar</button>
                <button type="button" class="mda-sr__button mda-si__confirm-button" data-confirm-submit>Confirmar</button>
            </div>
        </div>
    </div>

    <div class="mda-si__toast" data-toast hidden role="status" aria-live="polite">
        <span>✓</span><p data-toast-text></p><button type="button" data-toast-close aria-label="Fechar aviso">×</button>
    </div>
</section>
  <script>
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

  </script>
</body>
</html>
<!-- END_STANDALONE -->

