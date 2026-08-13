@extends('layout.app-public')


@section('content')
<main class="collaborator-profile" data-collaborator-profile>
    <svg class="collaborator-profile__sprite" aria-hidden="true" focusable="false">
        <symbol id="cp-icon-arrow" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
        <symbol id="cp-icon-alert" viewBox="0 0 24 24"><path d="M12 3 2.8 20h18.4L12 3Z"/><path d="M12 9v5M12 17.5v.1"/></symbol>
        <symbol id="cp-icon-briefcase" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M9 7V4h6v3M3 12h18M10 12v2h4v-2"/></symbol>
        <symbol id="cp-icon-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></symbol>
        <symbol id="cp-icon-certificate" viewBox="0 0 24 24"><circle cx="12" cy="9" r="6"/><path d="m8.5 14-1 8 4.5-2 4.5 2-1-8"/></symbol>
        <symbol id="cp-icon-check" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></symbol>
        <symbol id="cp-icon-chevron" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6"/></symbol>
        <symbol id="cp-icon-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
        <symbol id="cp-icon-copy" viewBox="0 0 24 24"><rect x="8" y="8" width="12" height="12" rx="2"/><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2"/></symbol>
        <symbol id="cp-icon-edit" viewBox="0 0 24 24"><path d="m4 16-1 5 5-1L19 9l-4-4L4 16Z"/><path d="m13.5 6.5 4 4"/></symbol>
        <symbol id="cp-icon-email" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></symbol>
        <symbol id="cp-icon-file" viewBox="0 0 24 24"><path d="M6 3h9l3 3v15H6V3Z"/><path d="M15 3v4h4M9 12h6M9 16h4"/></symbol>
        <symbol id="cp-icon-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7.5v.1"/></symbol>
        <symbol id="cp-icon-location" viewBox="0 0 24 24"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></symbol>
        <symbol id="cp-icon-phone" viewBox="0 0 24 24"><path d="M8.5 3H5a2 2 0 0 0-2 2c0 8.8 7.2 16 16 16a2 2 0 0 0 2-2v-3.5l-4-1-1.5 2.5a13 13 0 0 1-8.5-8.5L9.5 7l-1-4Z"/></symbol>
        <symbol id="cp-icon-shield" viewBox="0 0 24 24"><path d="M12 3 5 6v5c0 4.8 2.8 8.2 7 10 4.2-1.8 7-5.2 7-10V6l-7-3Z"/><path d="m9 12 2 2 4-4"/></symbol>
        <symbol id="cp-icon-star" viewBox="0 0 24 24"><path d="m12 2.8 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-2.9L6.4 20l1.1-6.2L3 9.4l6.2-.9L12 2.8Z"/></symbol>
        <symbol id="cp-icon-tools" viewBox="0 0 24 24"><path d="M14.5 6.2a5 5 0 0 0-6.7 6.7L3 17.7 6.3 21l4.8-4.8a5 5 0 0 0 6.7-6.7l-3.1 3.1-3.3-.7-.7-3.3Z"/></symbol>
        <symbol id="cp-icon-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></symbol>
        <symbol id="cp-icon-wallet" viewBox="0 0 24 24"><path d="M4 6.5A2.5 2.5 0 0 1 6.5 4H18v16H6.5A2.5 2.5 0 0 1 4 17.5Z"/><path d="M4 8h14M15 12h6v5h-6a2.5 2.5 0 0 1 0-5Z"/></symbol>
        <symbol id="cp-icon-x" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></symbol>
    </svg>

    <nav class="collaborator-profile__breadcrumb" aria-label="Navegação estrutural" data-reveal>
        <a href="#">Colaboradores</a>
        <svg><use href="#cp-icon-chevron"></use></svg>
        <strong>Perfil</strong>
    </nav>

    <section class="collaborator-profile__hero" id="visao-geral" data-profile-section data-reveal>
        <div class="collaborator-profile__identity">
            <div class="collaborator-profile__avatar">
                <img src="https://i.pravatar.cc/300?img=12" alt="Foto de {{ $user->name ?? 'colaborador' }}">
                <span aria-label="Perfil verificado">
                    <svg><use href="#cp-icon-check"></use></svg>
                </span>
            </div>

            <div class="collaborator-profile__hero-info">
                <span class="collaborator-profile__state"><i></i>Ativo</span>
                <h1>{{ $user->name ?? 'Colaborador' }} {{ $user->sobrenome ?? '' }}</h1>
                <p>{{ $colaborador->profissao?->nome ?? 'Profissão não cadastrada' }}</p>

                <div class="collaborator-profile__meta">
                    <span>
                        <svg><use href="#cp-icon-location"></use></svg>
                        @if($user->endereco)
                            {{ $user->endereco->cidade }}, {{ $user->endereco->estado }}
                        @else
                            Localização não cadastrada
                        @endif
                    </span>
                    <span><svg><use href="#cp-icon-star"></use></svg>4.9</span>
                    <span>127 avaliações</span>
                    <span>
                        <svg><use href="#cp-icon-calendar"></use></svg>
                        Membro desde {{ $colaborador->user?->created_at?->format('m/Y') ?? '—' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="collaborator-profile__actions">
            <a href="{{ route('colaborador.edit', ['colaborador' => $colaborador->id]) }}" class="collaborator-profile__button is-gold">
                <svg><use href="#cp-icon-edit"></use></svg>
                Editar perfil
            </a>
            <button type="button" class="collaborator-profile__button is-dark" data-block-open>
                <svg><use href="#cp-icon-shield"></use></svg>
                Bloquear
            </button>
        </div>
    </section>

    <nav class="collaborator-profile__tabs" aria-label="Seções do perfil" data-profile-tabs data-reveal>
        <a href="#visao-geral" class="is-active" data-profile-tab>Visão geral</a>
        <a href="#profissao" data-profile-tab>Profissão</a>
        <a href="#qualificacoes" data-profile-tab>Qualificações</a>
        <a href="#servicos" data-profile-tab>Serviços</a>
        <a href="#avaliacoes" data-profile-tab>Avaliações</a>
        <a href="#documentos" data-profile-tab>Documentos</a>
    </nav>

    <section class="collaborator-profile__stats" aria-label="Indicadores do colaborador">
        <article class="collaborator-profile__stat" data-reveal>
            <span class="collaborator-profile__stat-icon is-gold"><svg><use href="#cp-icon-tools"></use></svg></span>
            <div>
                <span>Serviços realizados</span>
                <strong data-counter="184">184</strong>
                <small class="is-positive">+12 este mês</small>
            </div>
        </article>

        <article class="collaborator-profile__stat" data-reveal>
            <span class="collaborator-profile__stat-icon"><svg><use href="#cp-icon-star"></use></svg></span>
            <div>
                <span>Avaliação média</span>
                <strong data-counter="4.9" data-decimals="1">4.9</strong>
                <small>127 avaliações</small>
            </div>
        </article>

        <article class="collaborator-profile__stat" data-reveal>
            <span class="collaborator-profile__stat-icon"><svg><use href="#cp-icon-certificate"></use></svg></span>
            <div>
                <span>Qualificações</span>
                <strong data-counter="{{ $colaborador->qualificacoes?->count() ?? 0 }}">{{ $colaborador->qualificacoes?->count() ?? 0 }}</strong>
                <small>{{ $colaborador->qualificacoes?->whereNotNull('arquivo')->count() ?? 0 }} com arquivo</small>
            </div>
        </article>

        <article class="collaborator-profile__stat" data-reveal>
            <span class="collaborator-profile__stat-icon"><svg><use href="#cp-icon-shield"></use></svg></span>
            <div>
                <span>Taxa de aprovação</span>
                <strong data-counter="98" data-suffix="%">98%</strong>
                <small class="is-positive">Excelente desempenho</small>
            </div>
        </article>
    </section>

    <section class="collaborator-profile__content">
        <div class="collaborator-profile__primary">
            <article class="collaborator-profile__card" data-reveal>
                <header class="collaborator-profile__card-header">
                    <div>
                        <span>APRESENTAÇÃO</span>
                        <h2>Sobre o colaborador</h2>
                    </div>
                    <span class="collaborator-profile__verified-label">
                        <svg><use href="#cp-icon-check"></use></svg>Perfil verificado
                    </span>
                </header>

                <div class="collaborator-profile__about">
                    <p>
                        Profissional com experiência em instalações elétricas residenciais,
                        manutenção preventiva, pequenos reparos e projetos fotovoltaicos.
                        Atua com foco em segurança, pontualidade e acabamento.
                    </p>

                    <div class="collaborator-profile__tags" aria-label="Principais qualificações">
                        @forelse($colaborador->qualificacoes as $qualificacao)
                            <span>{{ $qualificacao->titulo }}</span>
                        @empty
                            <span class="is-empty">Nenhuma qualificação cadastrada</span>
                        @endforelse
                    </div>
                </div>
            </article>

            <article class="collaborator-profile__card" id="profissao" data-profile-section data-reveal>
                <header class="collaborator-profile__card-header">
                    <div>
                        <span>ÁREA DE ATUAÇÃO</span>
                        <h2>Profissão</h2>
                    </div>
                </header>

                <div class="collaborator-profile__profession">
                    <span class="collaborator-profile__profession-icon"><svg><use href="#cp-icon-briefcase"></use></svg></span>
                    <div>
                        <strong>{{ $colaborador->profissao?->nome ?? 'Profissão não cadastrada' }}</strong>
                        <small>Profissão principal do colaborador</small>
                    </div>
                    <span class="collaborator-profile__pill is-success"><i></i>Ativo</span>
                </div>
            </article>

            <article class="collaborator-profile__card" id="qualificacoes" data-profile-section data-reveal>
                <header class="collaborator-profile__card-header">
                    <div>
                        <span>FORMAÇÃO E CERTIFICADOS</span>
                        <h2>Qualificações</h2>
                    </div>
                    <a href="#" data-placeholder-action>+ Adicionar</a>
                </header>

                <div class="collaborator-profile__qualification-list">
                    @forelse($colaborador->qualificacoes as $qualificacao)
                        <article class="collaborator-profile__qualification">
                            <span><svg><use href="#cp-icon-certificate"></use></svg></span>
                            <div>
                                <strong>{{ $qualificacao->titulo }}</strong>
                                <small>
                                    {{ $qualificacao->instituicao ?? 'Instituição não informada' }}
                                    @if(!empty($qualificacao->ano_inicio))
                                        • {{ $qualificacao->ano_inicio }}–{{ $qualificacao->ano_fim ?? 'Atual' }}
                                    @endif
                                </small>
                            </div>
                            @if(!empty($qualificacao->arquivo))
                                <span class="collaborator-profile__document-state is-file"><svg><use href="#cp-icon-file"></use></svg>Com arquivo</span>
                            @else
                                <span class="collaborator-profile__document-state">Sem arquivo</span>
                            @endif
                        </article>
                    @empty
                        <div class="collaborator-profile__empty">
                            <svg><use href="#cp-icon-certificate"></use></svg>
                            <strong>Nenhuma qualificação cadastrada</strong>
                            <small>Adicione cursos e certificados para fortalecer este perfil.</small>
                        </div>
                    @endforelse
                </div>
            </article>

            <article class="collaborator-profile__card" id="servicos" data-profile-section data-reveal>
                <header class="collaborator-profile__card-header">
                    <div>
                        <span>HISTÓRICO PROFISSIONAL</span>
                        <h2>Últimos serviços</h2>
                    </div>
                    <a href="#" data-placeholder-action>Ver todos</a>
                </header>

                <div class="collaborator-profile__filters" role="group" aria-label="Filtrar serviços">
                    <button type="button" class="is-active" data-service-filter="todos" aria-pressed="true">Todos</button>
                    <button type="button" data-service-filter="finalizado" aria-pressed="false">Finalizados</button>
                    <button type="button" data-service-filter="andamento" aria-pressed="false">Em andamento</button>
                </div>

                <div class="collaborator-profile__service-list">
                    <article class="collaborator-profile__service" data-service-status="finalizado">
                        <span class="collaborator-profile__service-icon"><svg><use href="#cp-icon-tools"></use></svg></span>
                        <div>
                            <strong>Instalação elétrica residencial</strong>
                            <small>Contratante: João Martins • 15/02/2026</small>
                        </div>
                        <span class="collaborator-profile__pill is-success"><i></i>Finalizado</span>
                    </article>

                    <article class="collaborator-profile__service" data-service-status="finalizado">
                        <span class="collaborator-profile__service-icon"><svg><use href="#cp-icon-tools"></use></svg></span>
                        <div>
                            <strong>Troca de disjuntores</strong>
                            <small>Contratante: Ana Paula • 08/02/2026</small>
                        </div>
                        <span class="collaborator-profile__pill is-success"><i></i>Finalizado</span>
                    </article>

                    <article class="collaborator-profile__service" data-service-status="andamento">
                        <span class="collaborator-profile__service-icon"><svg><use href="#cp-icon-clock"></use></svg></span>
                        <div>
                            <strong>Manutenção em quadro elétrico</strong>
                            <small>Contratante: Carlos Lima • Hoje às 14:30</small>
                        </div>
                        <span class="collaborator-profile__pill is-progress"><i></i>Em andamento</span>
                    </article>

                    <div class="collaborator-profile__empty" data-service-empty hidden>
                        <svg><use href="#cp-icon-tools"></use></svg>
                        <strong>Nenhum serviço nesta situação</strong>
                    </div>
                </div>
            </article>

            <article class="collaborator-profile__card" id="avaliacoes" data-profile-section data-reveal>
                <header class="collaborator-profile__card-header">
                    <div>
                        <span>REPUTAÇÃO</span>
                        <h2>Avaliações recentes</h2>
                    </div>
                    <a href="#" data-placeholder-action>Ver avaliações</a>
                </header>

                <div class="collaborator-profile__reviews">
                    <article class="collaborator-profile__review">
                        <header>
                            <span class="collaborator-profile__stars" aria-label="5 estrelas">★★★★★</span>
                            <b>5.0</b>
                        </header>
                        <p>Excelente profissional, pontual e muito caprichoso.</p>
                        <footer><span>MS</span><strong>Maria Souza</strong><time>há 2 dias</time></footer>
                    </article>

                    <article class="collaborator-profile__review">
                        <header>
                            <span class="collaborator-profile__stars" aria-label="5 estrelas">★★★★★</span>
                            <b>5.0</b>
                        </header>
                        <p>Resolveu o problema rapidamente e explicou todo o serviço.</p>
                        <footer><span>CL</span><strong>Carlos Lima</strong><time>há 5 dias</time></footer>
                    </article>
                </div>
            </article>
        </div>

        <aside class="collaborator-profile__aside">
            <article class="collaborator-profile__card" data-reveal>
                <header class="collaborator-profile__card-header">
                    <div><span>CADASTRO</span><h2>Informações</h2></div>
                </header>

                <div class="collaborator-profile__info-list">
                    <div class="collaborator-profile__info-row">
                        <span class="collaborator-profile__info-icon"><svg><use href="#cp-icon-user"></use></svg></span>
                        <div><small>CPF</small><strong>{{ $colaborador->cpf ?? 'Não cadastrado' }}</strong></div>
                        @if(!empty($colaborador->cpf))
                            <button type="button" data-copy="{{ $colaborador->cpf }}" data-copy-label="CPF" aria-label="Copiar CPF"><svg><use href="#cp-icon-copy"></use></svg></button>
                        @endif
                    </div>

                    <div class="collaborator-profile__info-row">
                        <span class="collaborator-profile__info-icon"><svg><use href="#cp-icon-phone"></use></svg></span>
                        <div><small>Telefone</small><strong>{{ $colaborador->telefone ?? 'Não cadastrado' }}</strong></div>
                        @if(!empty($colaborador->telefone))
                            <button type="button" data-copy="{{ $colaborador->telefone }}" data-copy-label="Telefone" aria-label="Copiar telefone"><svg><use href="#cp-icon-copy"></use></svg></button>
                        @endif
                    </div>

                    <div class="collaborator-profile__info-row">
                        <span class="collaborator-profile__info-icon"><svg><use href="#cp-icon-email"></use></svg></span>
                        <div><small>E-mail</small><strong>{{ $colaborador->user?->email ?? 'Não cadastrado' }}</strong></div>
                        @if(!empty($colaborador->user?->email))
                            <button type="button" data-copy="{{ $colaborador->user->email }}" data-copy-label="E-mail" aria-label="Copiar e-mail"><svg><use href="#cp-icon-copy"></use></svg></button>
                        @endif
                    </div>

                    <div class="collaborator-profile__info-row">
                        <span class="collaborator-profile__info-icon"><svg><use href="#cp-icon-wallet"></use></svg></span>
                        <div><small>Pix</small><strong>{{ ($pix_bool ?? false) ? 'Cadastrado' : 'Não cadastrado' }}</strong></div>
                        <span class="collaborator-profile__mini-state {{ ($pix_bool ?? false) ? 'is-ok' : 'is-warning' }}">
                            <svg><use href="#{{ ($pix_bool ?? false) ? 'cp-icon-check' : 'cp-icon-alert' }}"></use></svg>
                        </span>
                    </div>

                    <div class="collaborator-profile__info-row">
                        <span class="collaborator-profile__info-icon"><svg><use href="#cp-icon-clock"></use></svg></span>
                        <div><small>Último acesso</small><strong>Hoje às 09:42</strong></div>
                    </div>
                </div>
            </article>

            <article class="collaborator-profile__card" id="documentos" data-profile-section data-reveal>
                <header class="collaborator-profile__card-header">
                    <div><span>CONFORMIDADE</span><h2>Documentos</h2></div>
                </header>

                <div class="collaborator-profile__alerts">
                    <div class="collaborator-profile__alert is-warning">
                        <span><svg><use href="#cp-icon-alert"></use></svg></span>
                        <div><strong>Certificado NR-10</strong><small>Vence em 40 dias</small></div>
                    </div>
                    <div class="collaborator-profile__alert is-success">
                        <span><svg><use href="#cp-icon-check"></use></svg></span>
                        <div><strong>Conta verificada</strong><small>Identidade confirmada</small></div>
                    </div>
                    <div class="collaborator-profile__alert is-success">
                        <span><svg><use href="#cp-icon-check"></use></svg></span>
                        <div><strong>Telefone confirmado</strong><small>Contato validado</small></div>
                    </div>
                </div>
            </article>

            <article class="collaborator-profile__card collaborator-profile__score" data-reveal>
                <header class="collaborator-profile__card-header">
                    <div><span>DESEMPENHO</span><h2>Qualidade do perfil</h2></div>
                    <b>Excelente</b>
                </header>
                <div class="collaborator-profile__score-body">
                    <div class="collaborator-profile__progress" data-progress="92" aria-label="Perfil 92% completo">
                        <div><strong>92%</strong><small>completo</small></div>
                    </div>
                    <p>Perfil muito bem preenchido e pronto para receber novos serviços.</p>
                </div>
            </article>
        </aside>
    </section>

    <section class="collaborator-profile__banner" data-reveal>
        <span><svg><use href="#cp-icon-star"></use></svg></span>
        <div>
            <small>DESTAQUE DA PLATAFORMA</small>
            <h2>Este colaborador está entre os 15% mais bem avaliados da região.</h2>
            <p>Bom histórico de conclusão, avaliações positivas e documentação atualizada.</p>
        </div>
    </section>

    <div class="collaborator-profile__toast" data-profile-toast hidden role="status" aria-live="polite">
        <span><svg><use href="#cp-icon-info"></use></svg></span>
        <p data-profile-toast-text></p>
        <button type="button" data-profile-toast-close aria-label="Fechar aviso">×</button>
    </div>

    <div class="collaborator-profile__modal" data-block-modal hidden>
        <div class="collaborator-profile__modal-backdrop" data-block-close></div>
        <section role="dialog" aria-modal="true" aria-labelledby="block-dialog-title" tabindex="-1" data-block-dialog>
            <button type="button" class="collaborator-profile__modal-close" data-block-close aria-label="Fechar janela">×</button>
            <span class="collaborator-profile__modal-icon"><svg><use href="#cp-icon-shield"></use></svg></span>
            <small>CONFIRMAÇÃO NECESSÁRIA</small>
            <h2 id="block-dialog-title">Bloquear colaborador?</h2>
            <p>O perfil ficará impedido de receber novos serviços até ser desbloqueado.</p>
            <div>
                <button type="button" class="collaborator-profile__button is-outline" data-block-close>Cancelar</button>
                <button type="button" class="collaborator-profile__button is-danger" data-block-confirm>Confirmar bloqueio</button>
            </div>
        </section>
    </div>
</main>
@endsection

@push('scripts')
    <script src="{{ asset('js/colaborador-index.js') }}" defer></script>
@endpush
