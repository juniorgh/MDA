<section class="profession-create">
    <svg class="profession-create__sprite" aria-hidden="true" focusable="false">
        <symbol id="profession-icon-briefcase" viewBox="0 0 24 24">
            <rect x="3" y="7" width="18" height="13" rx="2"/>
            <path d="M9 7V4h6v3M3 12h18M10 12v2h4v-2"/>
        </symbol>
        <symbol id="profession-icon-shield" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/>
            <path d="m9 12 2 2 4-4"/>
        </symbol>
        <symbol id="profession-icon-text" viewBox="0 0 24 24">
            <path d="M4 6h16M8 6v14M16 6v14M6 20h12"/>
        </symbol>
        <symbol id="profession-icon-description" viewBox="0 0 24 24">
            <path d="M5 4h14v16H5zM8 8h8M8 12h8M8 16h5"/>
        </symbol>
        <symbol id="profession-icon-spark" viewBox="0 0 24 24">
            <path d="m12 3 1.3 4.7L18 9l-4.7 1.3L12 15l-1.3-4.7L6 9l4.7-1.3L12 3ZM18.5 15l.7 2.3 2.3.7-2.3.7-.7 2.3-.7-2.3-2.3-.7 2.3-.7.7-2.3Z"/>
        </symbol>
        <symbol id="profession-icon-order" viewBox="0 0 24 24">
            <path d="M9 6h11M9 12h8M9 18h5M4 4v4M3 8h2M3 13h3l-3 4h3"/>
        </symbol>
        <symbol id="profession-icon-check" viewBox="0 0 24 24">
            <path d="m5 12 4 4L19 6"/>
        </symbol>
        <symbol id="profession-icon-arrow" viewBox="0 0 24 24">
            <path d="M5 12h14M13 6l6 6-6 6"/>
        </symbol>
        <symbol id="profession-icon-info" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 11v6M12 7.5v.1"/>
        </symbol>
    </svg>

    <header class="profession-create__heading">
        <div>
            <span class="profession-create__eyebrow">CATÁLOGO DA PLATAFORMA</span>
            <h1>{{ !empty($profissao->id) ? 'Editar profissão' : 'Cadastrar profissão' }}</h1>
            <p>Organize as áreas profissionais disponíveis para os colaboradores.</p>
        </div>

        <div class="profession-create__security">
            <span><svg><use href="#profession-icon-shield"></use></svg></span>
            <div>
                <strong>Cadastro administrativo</strong>
                <small>Disponível para seleção no perfil profissional</small>
            </div>
        </div>
    </header>

    <div class="profession-create__layout">
        @if(!empty($profissao->id))
            <form class="crud-create-form profession-create__form" action="{{ route('profissao.update', ['profissao' => $profissao->id]) }}" method="POST">
                @method('PUT')
        @else
            <form class="crud-create-form profession-create__form" action="{{ route('profissao.store') }}" method="POST">
        @endif
            @csrf

            <fieldset class="crud-create-fset profession-create__fieldset">
                <legend class="profession-create__sr-only">Dados da profissão</legend>

                <div class="crud-create-leg profession-create__form-heading">
                    <div class="crud-create-leg-left profession-create__form-icon">
                        <svg><use href="#profession-icon-briefcase"></use></svg>
                    </div>

                    <div class="crud-create-leg-right">
                        <span class="profession-create__step">DADOS DA PROFISSÃO</span>
                        <h4 class="crud-create-leg-right__title">Informações de exibição</h4>
                        <p class="crud-create-leg-right__parag">Defina o nome, a descrição, o ícone e a posição no catálogo.</p>
                    </div>

                    <span class="profession-create__status">
                        <i></i>
                        {{ !empty($profissao->id) ? 'Editando' : 'Novo cadastro' }}
                    </span>
                </div>

                <div class="profession-create__body">
                    <div class="profession-create__grid">
                        <div class="profession-create__field profession-create__field--nome {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="nome">Nome</label>
                            <div class="profession-create__input">
                                <svg><use href="#profession-icon-text"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="nome"
                                    value="{{ $profissao->nome ?? old('nome') }}"
                                    id="nome"
                                    placeholder="Ex.: Eletricista"
                                >
                            </div>

                            @if($errors->has('nome'))
                                <small class="crud-create__error">{{ $errors->first('nome') }}</small>
                            @endif
                        </div>

                        <div class="profession-create__field profession-create__field--descricao {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="descricao">Descrição</label>
                            <div class="profession-create__input">
                                <svg><use href="#profession-icon-description"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="descricao"
                                    id="descricao"
                                    value="{{ $profissao->descricao ?? old('descricao') }}"
                                    placeholder="Ex.: Instalações, reparos e manutenção elétrica"
                                >
                            </div>

                            @if($errors->has('descricao'))
                                <small class="crud-create__error">{{ $errors->first('descricao') }}</small>
                            @endif
                        </div>

                        <div class="profession-create__field profession-create__field--icone {{ $errors->has('icone') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="icone">Ícone</label>
                            <div class="profession-create__input">
                                <svg><use href="#profession-icon-spark"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    value="{{ $profissao->icone ?? old('icone') }}"
                                    name="icone"
                                    id="icone"
                                    placeholder="Ex.: bolt"
                                >
                            </div>

                            @if($errors->has('icone'))
                                <small class="crud-create__error">{{ $errors->first('icone') }}</small>
                            @endif
                        </div>

                        <input class="crud-create__txt" type="hidden" name="ativo" id="ativo" value="1">

                        <div class="profession-create__field profession-create__field--ordem {{ $errors->has('ordem') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="ordem">Ordem</label>
                            <div class="profession-create__input">
                                <svg><use href="#profession-icon-order"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="ordem"
                                    name="ordem"
                                    id="ordem"
                                    value="{{ $profissao->ordem ?? old('ordem') }}"
                                    placeholder="Ex.: 1"
                                    inputmode="numeric"
                                >
                            </div>

                            @if($errors->has('ordem'))
                                <small class="crud-create__error">{{ $errors->first('ordem') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="profession-create__notice">
                        <span><svg><use href="#profession-icon-info"></use></svg></span>
                        <div>
                            <strong>Organização do catálogo</strong>
                            <p>A ordem define a posição da profissão nas listagens da plataforma.</p>
                        </div>
                    </div>
                </div>

                <div class="profession-create__footer">
                    <div>
                        <span><svg><use href="#profession-icon-check"></use></svg></span>
                        <p><strong>Profissão ativa</strong><small>O cadastro será salvo com o campo ativo igual a 1.</small></p>
                    </div>

                    <button class="crud-create__btn" type="submit">
                        {{ !empty($profissao->id) ? 'Salvar alterações' : 'Cadastrar profissão' }}
                        <svg><use href="#profession-icon-arrow"></use></svg>
                    </button>
                </div>
            </fieldset>
        </form>

        <aside class="profession-create__aside" aria-label="Informações sobre a profissão">
            <article class="profession-create__aside-main">
                <span><svg><use href="#profession-icon-briefcase"></use></svg></span>
                <small>CATÁLOGO PROFISSIONAL</small>
                <h2>Organize as atuações</h2>
                <p>Cada profissão cadastrada poderá ser vinculada aos colaboradores da plataforma.</p>

                <ul>
                    <li><i><svg><use href="#profession-icon-check"></use></svg></i>Nome objetivo</li>
                    <li><i><svg><use href="#profession-icon-check"></use></svg></i>Descrição clara</li>
                    <li><i><svg><use href="#profession-icon-check"></use></svg></i>Ordem definida</li>
                </ul>
            </article>

            <article class="profession-create__aside-tip">
                <span>!</span>
                <div>
                    <strong>Dica rápida</strong>
                    <p>Use nomes simples para facilitar a escolha do colaborador.</p>
                </div>
            </article>
        </aside>
    </div>
</section>
