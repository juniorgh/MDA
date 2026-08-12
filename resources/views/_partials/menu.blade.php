@php
    /*
     * Os itens opcionais só aparecem quando suas rotas existirem.
     * Isso evita links quebrados ou ícones apagados.
     */

    $menuGroups = [
        [
            'title' => 'Principal',
            'items' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'dashboard.index',
                    'active' => 'dashboard.*',
                    'icon' => 'home',
                ],
            ],
        ],
        [
            'title' => 'Pessoas',
            'items' => [
                [
                    'label' => 'Contratantes',
                    'route' => 'contratante.index',
                    'active' => 'contratante.*',
                    'icon' => 'user',
                ],
                [
                    'label' => 'Colaboradores',
                    'route' => 'colaborador.index',
                    'active' => 'colaborador.*',
                    'icon' => 'users',
                ],
                [
                    'label' => 'Profissões',
                    'route' => 'profissao.index',
                    'active' => 'profissao.*',
                    'icon' => 'briefcase',
                ],
            ],
        ],
        [
            'title' => 'Operação',
            'items' => [
                [
                    'label' => 'Solicitações',
                    'route' => 'solicitacao.index',
                    'active' => 'solicitacao.*',
                    'icon' => 'clipboard',
                ],
                [
                    'label' => 'Serviços',
                    'route' => 'servico.index',
                    'active' => 'servico.*',
                    'icon' => 'wrench',
                ],
                [
                    'label' => 'Portfólio',
                    'route' => 'portfolio.index',
                    'active' => 'portfolio.*',
                    'icon' => 'folder',
                ],
                [
                    'label' => 'Avaliações',
                    'route' => 'avaliacao.index',
                    'active' => 'avaliacao.*',
                    'icon' => 'star',
                ],
                [
                    'label' => 'Documentos',
                    'route' => 'documento.index',
                    'active' => 'documento.*',
                    'icon' => 'file',
                ],
            ],
        ],
        [
            'title' => 'Administração',
            'items' => [
                [
                    'label' => 'Financeiro',
                    'route' => 'financeiro.index',
                    'active' => 'financeiro.*',
                    'icon' => 'wallet',
                ],
                [
                    'label' => 'Configurações',
                    'route' => 'configuracao.index',
                    'active' => 'configuracao.*',
                    'icon' => 'settings',
                ],
            ],
        ],
    ];

    $loggedUser = auth()->user();

    $sidebarName = $loggedUser?->name ?? 'Gilson Junior';
    $sidebarRole = $sidebarRole ?? 'Administrador';

    $nameParts = preg_split(
        '/\s+/u',
        trim($sidebarName),
        -1,
        PREG_SPLIT_NO_EMPTY
    );

    if (count($nameParts) > 1) {
        $sidebarInitials =
            mb_substr($nameParts[0], 0, 1) .
            mb_substr($nameParts[count($nameParts) - 1], 0, 1);
    } else {
        $sidebarInitials =
            mb_substr($nameParts[0] ?? 'U', 0, 2);
    }

    $sidebarInitials = mb_strtoupper($sidebarInitials);

    $dashboardExists =
        \Illuminate\Support\Facades\Route::has('dashboard.index');

    $createServiceExists =
        \Illuminate\Support\Facades\Route::has('servico.create');
@endphp

{{-- Botão sanduíche exclusivo do celular --}}
<button
    type="button"
    class="mda-mobile-menu"
    data-mda-menu-open
    aria-controls="mda-side-menu"
    aria-expanded="false"
    aria-label="Abrir menu"
>
    <span></span>
    <span></span>
    <span></span>
</button>

<aside
    id="mda-side-menu"
    class="mda-side"
    data-mda-sidebar
>
    <header class="mda-side__header">
        <a
            href="{{ $dashboardExists ? route('dashboard.index') : '#' }}"
            class="mda-side__brand"
            title="MDA"
        >
            <span class="mda-side__brand-icon">M</span>

            <span class="mda-side__brand-text">
                <strong>MDA</strong>
                <small>Gestão de serviços</small>
            </span>
        </a>

        <button
            type="button"
            class="mda-side__collapse"
            data-mda-menu-collapse
            aria-label="Recolher menu"
            aria-expanded="true"
        >
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="m15 18-6-6 6-6"/>
            </svg>
        </button>
    </header>

    @if($createServiceExists)
        <a
            href="{{ route('servico.create') }}"
            class="mda-side__create"
            title="Solicitar serviço"
        >
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 5v14"/>
                <path d="M5 12h14"/>
            </svg>

            <span>Solicitar serviço</span>
        </a>
    @endif

    <nav class="mda-side__navigation" aria-label="Menu principal">
        @foreach($menuGroups as $group)
            @php
                $validItems = collect($group['items'])
                    ->filter(function ($item) {
                        return \Illuminate\Support\Facades\Route::has(
                            $item['route']
                        );
                    });
            @endphp

            @if($validItems->isNotEmpty())
                <section class="mda-side__group">
                    <h3>{{ $group['title'] }}</h3>

                    <div class="mda-side__items">
                        @foreach($validItems as $item)
                            @php
                                $isActive = request()->routeIs(
                                    $item['active']
                                );
                            @endphp

                            <a
                                href="{{ route($item['route']) }}"
                                class="mda-side__item {{ $isActive ? 'is-active' : '' }}"
                                title="{{ $item['label'] }}"
                                data-mda-navigation-link
                                @if($isActive)
                                    aria-current="page"
                                @endif
                            >
                                <svg
                                    class="mda-side__item-icon"
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    @switch($item['icon'])

                                        @case('home')
                                            <path d="M3 10.5 12 3l9 7.5"/>
                                            <path d="M5.5 9.5V21h13V9.5"/>
                                            <path d="M9.5 21v-7h5v7"/>
                                            @break

                                        @case('user')
                                            <circle cx="12" cy="8" r="4"/>
                                            <path d="M4.5 21c.5-4.4 3.1-6.7 7.5-6.7s7 2.3 7.5 6.7"/>
                                            @break

                                        @case('users')
                                            <circle cx="9" cy="8" r="3.5"/>
                                            <path d="M2.8 20c.4-3.8 2.5-5.8 6.2-5.8s5.8 2 6.2 5.8"/>
                                            <path d="M15.5 5.1a3.3 3.3 0 0 1 0 6.2"/>
                                            <path d="M16.5 14.4c2.8.4 4.3 2.3 4.7 5.6"/>
                                            @break

                                        @case('briefcase')
                                            <rect x="3" y="7" width="18" height="13" rx="2"/>
                                            <path d="M9 7V4h6v3"/>
                                            <path d="M3 12.5c5.5 2.2 12.5 2.2 18 0"/>
                                            <path d="M12 12v3"/>
                                            @break

                                        @case('clipboard')
                                            <rect x="5" y="4.5" width="14" height="17" rx="2"/>
                                            <path d="M9 4.5V3h6v1.5"/>
                                            <path d="M9 10h6"/>
                                            <path d="M9 14h6"/>
                                            <path d="M9 18h4"/>
                                            @break

                                        @case('wrench')
                                            <path d="M14.5 6.2a5 5 0 0 0-6.7 6.7L3 17.7 6.3 21l4.8-4.8a5 5 0 0 0 6.7-6.7l-3.1 3.1-3.3-.7-.7-3.3Z"/>
                                            @break

                                        @case('folder')
                                            <path d="M3 6.5A2.5 2.5 0 0 1 5.5 4H10l2 2h6.5A2.5 2.5 0 0 1 21 8.5v9A2.5 2.5 0 0 1 18.5 20h-13A2.5 2.5 0 0 1 3 17.5Z"/>
                                            @break

                                        @case('star')
                                            <path d="m12 3 2.7 5.5 6.1.9-4.4 4.3 1 6.1-5.4-2.9-5.4 2.9 1-6.1-4.4-4.3 6.1-.9Z"/>
                                            @break

                                        @case('file')
                                            <path d="M6 3h8l4 4v14H6Z"/>
                                            <path d="M14 3v5h5"/>
                                            <path d="M9 13h6"/>
                                            <path d="M9 17h6"/>
                                            @break

                                        @case('wallet')
                                            <path d="M4 6.5A2.5 2.5 0 0 1 6.5 4H18v16H6.5A2.5 2.5 0 0 1 4 17.5Z"/>
                                            <path d="M4 8h14"/>
                                            <path d="M15 12h6v5h-6a2.5 2.5 0 0 1 0-5Z"/>
                                            @break

                                        @case('settings')
                                            <circle cx="12" cy="12" r="3"/>
                                            <path d="M19 12a7 7 0 0 0-.1-1l2-1.5-2-3.4-2.4 1A7 7 0 0 0 15 6.2L14.7 4h-4L10.4 6.2A7 7 0 0 0 8.8 7L6.5 6.1l-2 3.4 1.9 1.5a7 7 0 0 0 0 2L4.5 14.5l2 3.4 2.3-.9a7 7 0 0 0 1.6.8l.3 2.2h4l.3-2.2a7 7 0 0 0 1.6-.8l2.3.9 2-3.4-2-1.5a7 7 0 0 0 .1-1Z"/>
                                            @break

                                    @endswitch
                                </svg>

                                <span class="mda-side__item-label">
                                    {{ $item['label'] }}
                                </span>

                                @if($isActive)
                                    <i class="mda-side__active-dot"></i>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        @endforeach
    </nav>

    <footer class="mda-side__footer">
        <div class="mda-side__user" title="{{ $sidebarName }}">
            <div class="mda-side__avatar">
                {{ $sidebarInitials }}
                <i></i>
            </div>

            <div class="mda-side__user-info">
                <strong>{{ $sidebarName }}</strong>
                <small>{{ $sidebarRole }}</small>
            </div>
        </div>
    </footer>
</aside>

<button
    type="button"
    class="mda-side-overlay"
    data-mda-menu-overlay
    aria-label="Fechar menu"
    tabindex="-1"
></button>