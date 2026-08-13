@extends('layout.app-public')

@php
    $categoria = $servicoCategoria ?? null;
    $editando = (bool) ($categoria?->exists);

    $iconeAtual = old(
        'icone',
        $categoria?->icone ?? 'bolt'
    );

    $ativoAtual = (bool) old(
        'ativo',
        $categoria?->ativo ?? true
    );

    $icones = [
        'bolt' => 'Elétrica',
        'drop' => 'Hidráulica',
        'paint' => 'Pintura',
        'hammer' => 'Montagem',
        'spark' => 'Limpeza',
        'snow' => 'Climatização',
    ];
@endphp

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/servico-categoria-form.css') }}" >
@endpush

@section('content')
<section class="mda-cat" data-category-editor data-editing="{{ $editando ? 'true' : 'false' }}">
    {{-- Ícones --}}
    <svg class="mda-cat__sprite" aria-hidden="true">
        <symbol id="mda-cat-icon-bolt" viewBox="0 0 24 24">
            <path d="M13 2 4.5 13H11l-1 9 8.5-12H12Z"/>
        </symbol>

        <symbol id="mda-cat-icon-drop" viewBox="0 0 24 24">
            <path d="M12 2S5 10 5 15a7 7 0 0 0 14 0c0-5-7-13-7-13Z"/>
        </symbol>

        <symbol id="mda-cat-icon-paint" viewBox="0 0 24 24">
            <path d="m14 4 6 6-9.5 9.5a2.1 2.1 0 0 1-3 0l-3-3a2.1 2.1 0 0 1 0-3Z"/>
            <path d="m12 6 6 6"/>
        </symbol>

        <symbol id="mda-cat-icon-hammer" viewBox="0 0 24 24">
            <path d="m14 6 4-4 4 4-4 4"/>
            <path d="m16 8-3 3"/>
            <path d="m11 9 4 4L6 22l-4-4Z"/>
        </symbol>

        <symbol id="mda-cat-icon-spark" viewBox="0 0 24 24">
            <path d="m12 2 1.5 6.5L20 10l-6.5 1.5L12 18l-1.5-6.5L4 10l6.5-1.5Z"/>
            <path d="m19 16 .7 2.3L22 19l-2.3.7L19 22l-.7-2.3L16 19l2.3-.7Z"/>
        </symbol>

        <symbol id="mda-cat-icon-snow" viewBox="0 0 24 24">
            <path d="M12 2v20"/>
            <path d="m4.2 6.5 15.6 11"/>
            <path d="m19.8 6.5-15.6 11"/>
            <path d="m9 4 3 3 3-3"/>
            <path d="m9 20 3-3 3 3"/>
        </symbol>
    </svg>

    <header class="mda-cat__header">
        <div>
            <span class="mda-cat__eyebrow">
                Configurações do sistema
            </span>

            <h1>
                {{ $editando ? 'Editar categoria' : 'Nova categoria' }}
            </h1>

            <p>
                Configure como a categoria será apresentada na solicitação de serviço.
            </p>
        </div>

        <span class="mda-cat__header-status">
            {{ $editando ? 'Editando cadastro' : 'Novo cadastro' }}
        </span>
    </header>

    @if($errors->any())
        <div class="mda-cat__alert" role="alert">
            <strong>Revise os campos destacados.</strong>
            <span>O formulário possui informações inválidas.</span>
        </div>
    @endif

    <form class="mda-cat__form" action="{{ route('servico-categoria.store') }}"  method="POST" data-category-form novalidate >
        @csrf

        <div class="mda-cat__columns">
            <div class="mda-cat__card">
                <div class="mda-cat__card-title">
                    <span>1</span>

                    <div>
                        <h2>Informações da categoria</h2>
                        <p>Defina o nome e a identificação interna.</p>
                    </div>
                </div>

                <div class="mda-cat__grid">
                    <div class="mda-cat__field {{ $errors->has('nome') ? 'is-invalid' : '' }}">
                        <label for="nome">
                            Nome <em>*</em>
                        </label>

                        <input type="text" id="nome" name="nome" value="{{ old('nome', $categoria?->nome) }}" maxlength="80" placeholder="Ex.: Elétrica" required autofocus data-name data-validate
                        >

                        <small>Nome apresentado para o usuário.</small>

                        @error('nome')
                            <p class="mda-cat__error" data-server-error>
                                {{ $message }}
                            </p>
                        @enderror

                        <p class="mda-cat__error" data-client-error hidden ></p>
                    </div>

                    <div class="mda-cat__field {{ $errors->has('slug') ? 'is-invalid' : '' }}">
                        <label for="slug">
                            Slug <em>*</em>
                        </label>

                        <div class="mda-cat__input-action">
                            <input type="text" id="slug" name="slug" value="{{ old('slug', $categoria?->slug) }}"
                                maxlength="100" pattern="[a-z0-9]+(-[a-z0-9]+)*" placeholder="eletrica" required data-slug data-validate >

                            <button type="button" data-generate-slug title="Gerar pelo nome" >
                                Gerar
                            </button>
                        </div>

                        <small>Identificação sem espaços ou acentos.</small>

                        @error('slug')
                            <p class="mda-cat__error" data-server-error>
                                {{ $message }}
                            </p>
                        @enderror

                        <p class="mda-cat__error" data-client-error hidden ></p>
                    </div>
                </div>

                <div class="mda-cat__field {{ $errors->has('descricao') ? 'is-invalid' : '' }}">
                    <div class="mda-cat__label-row">
                        <label for="descricao">Descrição</label>

                        <span data-description-count>
                            0/160
                        </span>
                    </div>

                    <textarea id="descricao" name="descricao" rows="5" maxlength="160" placeholder="Ex.: Instalações, manutenções e reparos elétricos." data-description data-validate >{{ old('descricao', $categoria?->descricao) }}</textarea>

                    @error('descricao')
                        <p class="mda-cat__error" data-server-error>
                            {{ $message }}
                        </p>
                    @enderror

                    <p class="mda-cat__error" data-client-error hidden ></p>
                </div>

                <div class="mda-cat__divider"></div>

                <div class="mda-cat__card-title">
                    <span>2</span>

                    <div>
                        <h2>Apresentação</h2>
                        <p>Escolha o ícone mostrado na tela de serviços.</p>
                    </div>
                </div>

                <div class="mda-cat__icons" data-icon-picker >
                    @foreach($icones as $valor => $rotulo)
                        <button
                            type="button"
                            class="mda-cat__icon-choice {{ $iconeAtual === $valor ? 'is-selected' : '' }}"
                            data-icon="{{ $valor }}"
                            aria-pressed="{{ $iconeAtual === $valor ? 'true' : 'false' }}" >
                            <svg aria-hidden="true">
                                <use href="#mda-cat-icon-{{ $valor }}"></use>
                            </svg>

                            <span>{{ $rotulo }}</span>

                            <i>✓</i>
                        </button>
                    @endforeach
                </div>

                <input type="hidden" id="icone" name="icone" value="{{ $iconeAtual }}" data-icon-input >

                @error('icone')
                    <p class="mda-cat__error">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mda-cat__grid mda-cat__grid--bottom">
                    <div class="mda-cat__field {{ $errors->has('ordem') ? 'is-invalid' : '' }}">
                        <label for="ordem">Ordem de exibição</label>

                        <input type="number" id="ordem" name="ordem" value="{{ old('ordem', $categoria?->ordem ?? 0) }}" min="0" max="65535" inputmode="numeric" data-order data-validate >

                        <small>Menores números aparecem primeiro.</small>

                        @error('ordem')
                            <p class="mda-cat__error" data-server-error>
                                {{ $message }}
                            </p>
                        @enderror

                        <p class="mda-cat__error" data-client-error hidden ></p>
                    </div>

                    <div class="mda-cat__field">
                        <label>Status da categoria</label>

                        <input type="hidden" name="ativo" value="0" >

                        <label class="mda-cat__switch">
                            <input type="checkbox" name="ativo" value="1" @checked($ativoAtual) data-active >

                            <span class="mda-cat__switch-control"></span>

                            <span>
                                <strong data-active-label>
                                    {{ $ativoAtual ? 'Categoria ativa' : 'Categoria inativa' }}
                                </strong>

                                <small>
                                    Categorias inativas não aparecem em novos serviços.
                                </small>
                            </span>
                        </label>

                        @error('ativo')
                            <p class="mda-cat__error">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <aside class="mda-cat__aside">
                <div class="mda-cat__preview">
                    <div class="mda-cat__preview-heading">
                        <span>PRÉ-VISUALIZAÇÃO</span>

                        <i class="{{ $ativoAtual ? 'is-active' : '' }}" data-preview-status >
                            {{ $ativoAtual ? 'Ativa' : 'Inativa' }}
                        </i>
                    </div>

                    <div class="mda-cat__preview-card">
                        <span class="mda-cat__preview-icon">
                            <svg data-preview-icon>
                                <use href="#mda-cat-icon-{{ $iconeAtual }}"></use>
                            </svg>
                        </span>

                        <div>
                            <strong data-preview-name>
                                {{ old('nome', $categoria?->nome ?? 'Nome da categoria') }}
                            </strong>

                            <small data-preview-description>
                                {{ old('descricao', $categoria?->descricao ?? 'Descrição da categoria') }}
                            </small>
                        </div>

                        <i class="mda-cat__preview-check">✓</i>
                    </div>

                    <div class="mda-cat__preview-meta">
                        <span>Slug</span>
                        <strong data-preview-slug>
                            {{ old('slug', $categoria?->slug ?? 'categoria') }}
                        </strong>
                    </div>

                    <div class="mda-cat__preview-meta">
                        <span>Posição</span>
                        <strong> Nº <span data-preview-order>
                                {{ old('ordem', $categoria?->ordem ?? 0) }}
                            </span>
                        </strong>
                    </div>
                </div>

                <div class="mda-cat__tip">
                    <strong>Boa prática</strong>

                    <p>
                        Desative categorias antigas em vez de excluí-las. Assim, os serviços existentes continuam relacionados corretamente.
                    </p>
                </div>
            </aside>
        </div>

        <footer class="mda-cat__actions">
            <a href="{{ route('servico-categoria.index') }}" class="mda-cat__cancel" >
                Cancelar
            </a>

            <button type="submit" class="mda-cat__submit" data-submit >
                <span data-submit-label>
                    {{ $editando ? 'Salvar alterações' : 'Cadastrar categoria' }}
                </span>
            </button>
        </footer>
    </form>
</section>
@endsection

@push('scripts')
    <script
        src="{{ asset('js/servico-categoria-form.js') }}"
        defer
    ></script>
@endpush