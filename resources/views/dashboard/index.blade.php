@extends('layout.app-public')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard-colaborador.css') }}">
@endpush

@section('content')
<main class="dashboard-colaborador" data-dashboard-colaborador>
    <svg class="dashboard-colaborador__sprite" aria-hidden="true" focusable="false">
        <symbol id="dashboard-icon-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></symbol>
        <symbol id="dashboard-icon-chevron" viewBox="0 0 24 24"><path d="m8 10 4 4 4-4"/></symbol>
        <symbol id="dashboard-icon-clipboard" viewBox="0 0 24 24"><rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4V2h6v2M9 9h6M9 13h6M9 17h4"/></symbol>
        <symbol id="dashboard-icon-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></symbol>
        <symbol id="dashboard-icon-alert" viewBox="0 0 24 24"><path d="M12 3 2.8 20h18.4L12 3Z"/><path d="M12 9v5M12 17.5v.1"/></symbol>
        <symbol id="dashboard-icon-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7.5v.1"/></symbol>
        <symbol id="dashboard-icon-arrow" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
        <symbol id="dashboard-icon-tools" viewBox="0 0 24 24"><path d="M14.5 6.2a5 5 0 0 0-6.7 6.7L3 17.7 6.3 21l4.8-4.8a5 5 0 0 0 6.7-6.7l-3.1 3.1-3.3-.7-.7-3.3Z"/></symbol>
        <symbol id="dashboard-icon-star" viewBox="0 0 24 24"><path d="m12 2.8 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-2.9L6.4 20l1.1-6.2L3 9.4l6.2-.9L12 2.8Z"/></symbol>
        <symbol id="dashboard-icon-eye" viewBox="0 0 24 24"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/></symbol>
        <symbol id="dashboard-icon-certificate" viewBox="0 0 24 24"><circle cx="12" cy="9" r="6"/><path d="m8.5 14-1 8 4.5-2 4.5 2-1-8"/></symbol>
        <symbol id="dashboard-icon-message" viewBox="0 0 24 24"><path d="M20 15a3 3 0 0 1-3 3H9l-5 3v-6a3 3 0 0 1-1-2.2V7a3 3 0 0 1 3-3h11a3 3 0 0 1 3 3Z"/></symbol>
        <symbol id="dashboard-icon-check" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></symbol>
        <symbol id="dashboard-icon-x" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></symbol>
        <symbol id="dashboard-icon-phone" viewBox="0 0 24 24"><path d="M8.5 3H5a2 2 0 0 0-2 2c0 8.8 7.2 16 16 16a2 2 0 0 0 2-2v-3.5l-4-1-1.5 2.5a13 13 0 0 1-8.5-8.5L9.5 7l-1-4Z"/></symbol>
        <symbol id="dashboard-icon-wallet" viewBox="0 0 24 24"><path d="M4 6.5A2.5 2.5 0 0 1 6.5 4H18v16H6.5A2.5 2.5 0 0 1 4 17.5Z"/><path d="M4 8h14M15 12h6v5h-6a2.5 2.5 0 0 1 0-5Z"/></symbol>
        <symbol id="dashboard-icon-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
        <symbol id="dashboard-icon-trophy" viewBox="0 0 24 24"><path d="M8 4h8v4a4 4 0 0 1-8 0V4ZM8 6H4v2a4 4 0 0 0 4 4M16 6h4v2a4 4 0 0 1-4 4M12 12v5M8 21h8M9 17h6"/></symbol>
        <symbol id="dashboard-icon-bell" viewBox="0 0 24 24"><path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9ZM10 21h4"/></symbol>
    </svg>

    <header class="topo dashboard-colaborador__topo" data-reveal>
        <div class="dashboard-colaborador__welcome">
            <span class="dashboard-colaborador__eyebrow">PAINEL DO COLABORADOR</span>
            <h1>Olá, {{ $user->name }} <span aria-hidden="true">👋</span></h1>
            <p>Veja o que precisa da sua atenção hoje.</p>
            <time class="dashboard-colaborador__date" data-current-date>
                <svg><use href="#dashboard-icon-calendar"></use></svg>
                Hoje
            </time>
        </div>

        <div class="dashboard-colaborador__top-actions">
            <button type="button" class="dashboard-colaborador__notification" data-placeholder-action aria-label="Notificações">
                <svg><use href="#dashboard-icon-bell"></use></svg>
                <i></i>
            </button>

            <div class="avatar-mini">
                <img src="https://i.pravatar.cc/100?img=12" alt="Foto de {{ $user->name }}">
                <span>
                    <small>Colaborador</small>
                    <strong>{{ $user->name }} {{ explode(' ', $user->sobrenome)[0] }}</strong>
                </span>
                <svg><use href="#dashboard-icon-chevron"></use></svg>
            </div>
        </div>
    </header>

    @if(count($cadastrosFaltantes) > 0)
        <section class="painel-acoes painel-acoes--required" data-collapsible data-reveal>
            <header class="dashboard-colaborador__section-heading">
                <div class="dashboard-colaborador__section-icon is-alert">
                    <svg><use href="#dashboard-icon-alert"></use></svg>
                </div>
                <div>
                    <span>ATENÇÃO NECESSÁRIA</span>
                    <h2>Informações obrigatórias</h2>
                    <p>Para a plataforma funcionar perfeitamente, é necessário complementar informações.</p>
                </div>
                <b>{{ count($cadastrosFaltantes) }} pendente{{ count($cadastrosFaltantes) > 1 ? 's' : '' }}</b>
                <button type="button" class="dashboard-colaborador__collapse" data-collapsible-toggle aria-expanded="true" aria-label="Recolher informações obrigatórias">
                    <svg><use href="#dashboard-icon-chevron"></use></svg>
                </button>
            </header>

            <div class="dashboard-colaborador__action-list" data-collapsible-body>
                @foreach($cadastrosFaltantes as $faltantes)
                    <article class="acao">
                        <div class="icone"><svg><use href="#dashboard-icon-clipboard"></use></svg></div>
                        <div>
                            <strong>{{ $faltantes['slug'] }}</strong>
                            <small>{{ $faltantes['mensagem'] }}</small>
                        </div>
                        <a href="{{ route($faltantes['classe']) }}" class="btn gold">
                            Adicionar {{ $faltantes['slug'] }}
                            <svg><use href="#dashboard-icon-arrow"></use></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    <section class="painel-acoes painel-acoes--central" data-reveal>
        <header class="dashboard-colaborador__section-heading">
            <div class="dashboard-colaborador__section-icon">
                <svg><use href="#dashboard-icon-tools"></use></svg>
            </div>
            <div>
                <span>PRIORIDADES DO DIA</span>
                <h2>Central de ações</h2>
                <p>Prioridades rápidas para manter seu perfil ativo e competitivo.</p>
            </div>
        </header>

        <div class="dashboard-colaborador__action-list">
            <article class="acao">
                <div class="icone"><svg><use href="#dashboard-icon-user"></use></svg></div>
                <div>
                    <strong>Seu perfil está 82% completo</strong>
                    <small>Adicione descrição e mais qualificações.</small>
                </div>
                <span class="dashboard-colaborador__action-state">2 etapas restantes</span>
            </article>

            <article class="acao">
                <div class="icone is-warning"><svg><use href="#dashboard-icon-alert"></use></svg></div>
                <div>
                    <strong>Certificado NR-10 vence em 20 dias</strong>
                    <small>Atualize o documento para manter a conta regular.</small>
                </div>
                <a href="#" class="btn outline" data-placeholder-action>Atualizar</a>
            </article>
        </div>
    </section>

    <section class="metricas" aria-label="Resumo do perfil">
        <article class="card" data-reveal>
            <span class="dashboard-colaborador__metric-icon is-gold"><svg><use href="#dashboard-icon-tools"></use></svg></span>
            <div><span>Serviços ativos</span><strong data-counter="3">3</strong><small>2 em andamento</small></div>
        </article>

        <article class="card" data-reveal>
            <span class="dashboard-colaborador__metric-icon"><svg><use href="#dashboard-icon-star"></use></svg></span>
            <div><span>Avaliação média</span><strong data-counter="4.9" data-decimals="1">4.9</strong><small>127 avaliações</small></div>
        </article>

        <article class="card" data-reveal>
            <span class="dashboard-colaborador__metric-icon"><svg><use href="#dashboard-icon-eye"></use></svg></span>
            <div><span>Visitas no perfil</span><strong data-counter="234">234</strong><small>últimos 30 dias</small></div>
        </article>

        <article class="card" data-reveal>
            <span class="dashboard-colaborador__metric-icon"><svg><use href="#dashboard-icon-certificate"></use></svg></span>
            <div><span>Qualificações</span><strong data-counter="12">12</strong><small>8 com certificado</small></div>
        </article>
    </section>

    <section class="grid dashboard-colaborador__grid">
        <div class="dashboard-colaborador__primary-column">
            <article class="box dashboard-colaborador__services" data-reveal>
                <div class="box-header">
                    <div>
                        <span>ATIVIDADE RECENTE</span>
                        <h3>Serviços recentes</h3>
                    </div>
                    <a href="#" data-placeholder-action>Ver todos</a>
                </div>

                <div class="dashboard-colaborador__filters" role="group" aria-label="Filtrar serviços">
                    <button type="button" class="is-active" data-service-filter="todos" aria-pressed="true">Todos</button>
                    <button type="button" data-service-filter="ativos" aria-pressed="false">Ativos</button>
                    <button type="button" data-service-filter="finalizados" aria-pressed="false">Finalizados</button>
                </div>

                <div class="dashboard-colaborador__service-list" data-service-list>
                    <article class="servico" data-service-status="andamento">
                        <span class="dashboard-colaborador__service-icon"><svg><use href="#dashboard-icon-tools"></use></svg></span>
                        <div>
                            <strong>Instalação elétrica residencial</strong>
                            <small>Cliente: João Martins • Hoje às 10:30</small>
                        </div>
                        <span class="status andamento"><i></i>Em andamento</span>
                    </article>

                    <article class="servico" data-service-status="finalizado">
                        <span class="dashboard-colaborador__service-icon"><svg><use href="#dashboard-icon-check"></use></svg></span>
                        <div>
                            <strong>Troca de disjuntores</strong>
                            <small>Cliente: Ana Paula • Ontem</small>
                        </div>
                        <span class="status finalizado"><i></i>Finalizado</span>
                    </article>

                    <article class="servico" data-service-status="aguardando">
                        <span class="dashboard-colaborador__service-icon"><svg><use href="#dashboard-icon-clock"></use></svg></span>
                        <div>
                            <strong>Orçamento para energia solar</strong>
                            <small>Cliente: Carlos Lima • 18/06/2026</small>
                        </div>
                        <span class="status aguardando"><i></i>Aguardando</span>
                    </article>

                    <div class="dashboard-colaborador__empty" data-service-empty hidden>
                        <svg><use href="#dashboard-icon-tools"></use></svg>
                        <strong>Nenhum serviço nesta situação</strong>
                    </div>
                </div>
            </article>

            <article class="box dashboard-colaborador__reviews" data-reveal>
                <div class="box-header">
                    <div>
                        <span>REPUTAÇÃO</span>
                        <h3>Últimas avaliações</h3>
                    </div>
                    <a href="#" data-placeholder-action>Ver avaliações</a>
                </div>

                <div class="dashboard-colaborador__review-grid">
                    <article class="avaliacao">
                        <header><strong>★★★★★</strong><span>5.0</span></header>
                        <p>Excelente profissional. Pontual, educado e caprichoso.</p>
                        <footer><i>MS</i><small>Maria Souza</small><time>há 2 dias</time></footer>
                    </article>

                    <article class="avaliacao">
                        <header><strong>★★★★★</strong><span>5.0</span></header>
                        <p>Resolveu o problema rapidamente e explicou tudo com clareza.</p>
                        <footer><i>RA</i><small>Roberto Almeida</small><time>há 5 dias</time></footer>
                    </article>
                </div>
            </article>
        </div>

        <aside class="dashboard-colaborador__aside">
            <article class="box perfil-card" data-reveal>
                <div class="box-header">
                    <div><span>VISIBILIDADE</span><h3>Meu perfil</h3></div>
                    <b>Bom</b>
                </div>

                <div class="progresso" data-progress="82" aria-label="Perfil 82% completo">
                    <div><strong>82%</strong><small>completo</small></div>
                </div>

                <ul class="lista-check">
                    <li class="ok"><i><svg><use href="#dashboard-icon-check"></use></svg></i>Foto adicionada</li>
                    <li class="ok"><i><svg><use href="#dashboard-icon-check"></use></svg></i>Profissão cadastrada</li>
                    <li class="erro"><i><svg><use href="#dashboard-icon-x"></use></svg></i>Falta descrição profissional</li>
                    <li class="erro"><i><svg><use href="#dashboard-icon-x"></use></svg></i>Adicione mais 2 qualificações</li>
                </ul>

                <a href="#" class="btn gold" data-placeholder-action>Editar perfil</a>
            </article>

            <article class="box dashboard-colaborador__quick" data-reveal>
                <div class="box-header">
                    <div><span>CADASTRO</span><h3>Configuração rápida</h3></div>
                </div>

                <div class="servico">
                    <span><svg><use href="#dashboard-icon-phone"></use></svg></span>
                    <div><strong>Telefone</strong><small>(41) 99999-9999</small></div>
                    <i class="is-ok"><svg><use href="#dashboard-icon-check"></use></svg></i>
                </div>

                <div class="servico">
                    <span><svg><use href="#dashboard-icon-wallet"></use></svg></span>
                    <div><strong>Pix</strong><small>Cadastrado</small></div>
                    <i class="is-ok"><svg><use href="#dashboard-icon-check"></use></svg></i>
                </div>

                <div class="servico">
                    <span><svg><use href="#dashboard-icon-calendar"></use></svg></span>
                    <div><strong>Disponibilidade</strong><small>Segunda a sábado</small></div>
                    <i class="is-ok"><svg><use href="#dashboard-icon-check"></use></svg></i>
                </div>
            </article>
        </aside>
    </section>

    <section class="banner" data-reveal>
        <div class="banner-icon"><svg><use href="#dashboard-icon-trophy"></use></svg></div>
        <div>
            <span>DESTAQUE REGIONAL</span>
            <h3>Você está entre os 15% melhores eletricistas da sua região.</h3>
            <p>Completar seu perfil pode aumentar sua posição nas buscas.</p>
        </div>
        <a href="#" class="btn gold" data-placeholder-action>Melhorar perfil</a>
    </section>

    <div class="dashboard-colaborador__toast" data-dashboard-toast hidden role="status" aria-live="polite">
        <span><svg><use href="#dashboard-icon-info"></use></svg></span>
        <p data-dashboard-toast-text></p>
        <button type="button" data-dashboard-toast-close aria-label="Fechar aviso">×</button>
    </div>
</main>
@endsection

@push('scripts')
    <script src="{{ asset('js/dashboard-colaborador.js') }}" defer></script>
@endpush
