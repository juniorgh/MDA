<section class="collaborator-create">
    <svg class="collaborator-create__sprite" aria-hidden="true" focusable="false">
        <symbol id="collaborator-icon-worker" viewBox="0 0 24 24">
            <circle cx="12" cy="8" r="4"/>
            <path d="M4 21a8 8 0 0 1 16 0M7 7V5a5 5 0 0 1 10 0v2M5 7h14"/>
        </symbol>
        <symbol id="collaborator-icon-shield" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/>
            <path d="m9 12 2 2 4-4"/>
        </symbol>
        <symbol id="collaborator-icon-card" viewBox="0 0 24 24">
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="M3 9h18M7 14h4"/>
        </symbol>
        <symbol id="collaborator-icon-phone" viewBox="0 0 24 24">
            <path d="M8.5 3H5a2 2 0 0 0-2 2c0 8.8 7.2 16 16 16a2 2 0 0 0 2-2v-3.5l-4-1-1.5 2.5a13 13 0 0 1-8.5-8.5L9.5 7l-1-4Z"/>
        </symbol>
        <symbol id="collaborator-icon-key" viewBox="0 0 24 24">
            <circle cx="8" cy="15" r="4"/>
            <path d="m11 12 9-9M15 8l3 3M17 6l2 2"/>
        </symbol>
        <symbol id="collaborator-icon-briefcase" viewBox="0 0 24 24">
            <rect x="3" y="7" width="18" height="13" rx="2"/>
            <path d="M9 7V4h6v3M3 12h18M10 12v2h4v-2"/>
        </symbol>
        <symbol id="collaborator-icon-check" viewBox="0 0 24 24">
            <path d="m5 12 4 4L19 6"/>
        </symbol>
        <symbol id="collaborator-icon-arrow" viewBox="0 0 24 24">
            <path d="M5 12h14M13 6l6 6-6 6"/>
        </symbol>
        <symbol id="collaborator-icon-info" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 11v6M12 7.5v.1"/>
        </symbol>
    </svg>

    <header class="collaborator-create__heading">
        <div>
            <span class="collaborator-create__eyebrow">PERFIL DO COLABORADOR</span>
            <h1>{{ !empty($colaborador->id) ? 'Editar dados profissionais' : 'Complete seu cadastro' }}</h1>
            <p>Informe seus dados principais e selecione a profissão que representa seu trabalho.</p>
        </div>

        <div class="collaborator-create__security">
            <span><svg><use href="#collaborator-icon-shield"></use></svg></span>
            <div>
                <strong>Dados protegidos</strong>
                <small>Informações vinculadas ao seu perfil</small>
            </div>
        </div>
    </header>

    <div class="collaborator-create__layout">
        @if(!empty($colaborador->id))
            <form class="crud-create-form collaborator-create__form" action="{{ route('colaborador.update', ['colaborador' => $colaborador->id]) }}" method="POST">
                @method('PUT')
        @else
            <form class="crud-create-form collaborator-create__form" action="{{ route('colaborador.store') }}" method="POST">
        @endif
            @csrf

            <fieldset class="crud-create-fset collaborator-create__fieldset">
                <legend class="collaborator-create__sr-only">Dados pessoais e profissionais</legend>

                <div class="crud-create-leg collaborator-create__form-heading">
                    <div class="crud-create-leg-left collaborator-create__form-icon">
                        <svg><use href="#collaborator-icon-worker"></use></svg>
                    </div>

                    <div class="crud-create-leg-right">
                        <span class="collaborator-create__step">DADOS PROFISSIONAIS</span>
                        <h4 class="crud-create-leg-right__title">Informações do colaborador</h4>
                        <p class="crud-create-leg-right__parag">Preencha os dados utilizados na identificação, contato e atuação profissional.</p>
                    </div>

                    <span class="collaborator-create__status">
                        <i></i>
                        {{ !empty($colaborador->id) ? 'Editando' : 'Novo cadastro' }}
                    </span>
                </div>

                <div class="collaborator-create__body">
                    <div class="collaborator-create__grid">
                        <div class="collaborator-create__field collaborator-create__field--cpf {{ $errors->has('cpf') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="cpf">CPF</label>
                            <div class="collaborator-create__input">
                                <svg><use href="#collaborator-icon-card"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="cpf"
                                    id="cpf"
                                    value="{{ $colaborador->cpf ?? old('cpf') }}"
                                    placeholder="Ex.: 000.000.000-00"
                                    inputmode="numeric"
                                    autocomplete="off"
                                >
                            </div>

                            @if($errors->has('cpf'))
                                <small class="crud-create__error">{{ $errors->first('cpf') }}</small>
                            @endif
                        </div>

                        <div class="collaborator-create__field collaborator-create__field--telefone {{ $errors->has('telefone') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="telefone">Telefone</label>
                            <div class="collaborator-create__input">
                                <svg><use href="#collaborator-icon-phone"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    value="{{ $colaborador->telefone ?? old('telefone') }}"
                                    name="telefone"
                                    id="telefone"
                                    placeholder="Ex.: (41) 99999-9999"
                                    inputmode="tel"
                                    autocomplete="tel"
                                >
                            </div>

                            @if($errors->has('telefone'))
                                <small class="crud-create__error">{{ $errors->first('telefone') }}</small>
                            @endif
                        </div>

                        <div class="collaborator-create__field collaborator-create__field--pix {{ $errors->has('chave_pix') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="chave_pix">Chave Pix</label>
                            <div class="collaborator-create__input">
                                <svg><use href="#collaborator-icon-key"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="chave_pix"
                                    id="chave_pix"
                                    value="{{ $colaborador->chave_pix ?? old('chave_pix') }}"
                                    placeholder="Digite aqui sua chave Pix"
                                    autocomplete="off"
                                >
                            </div>

                            @if($errors->has('chave_pix'))
                                <small class="crud-create__error">{{ $errors->first('chave_pix') }}</small>
                            @endif
                        </div>

                        <div class="collaborator-create__field collaborator-create__field--profissao {{ $errors->has('profissao_id') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="profissao_id">Profissões disponíveis</label>
                            <div class="collaborator-create__input collaborator-create__input--select">
                                <svg><use href="#collaborator-icon-briefcase"></use></svg>
                                <select class="crud-create__txt" name="profissao_id" id="profissao_id">
                                    <option>SELECIONE</option>

                                    @foreach($profissoes as $profissao)
                                        <option value="{{ $profissao->id }}">{{ $profissao->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if($errors->has('profissao_id'))
                                <small class="crud-create__error">{{ $errors->first('profissao_id') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="collaborator-create__notice">
                        <span><svg><use href="#collaborator-icon-info"></use></svg></span>
                        <div>
                            <strong>Escolha sua principal atuação</strong>
                            <p>A profissão selecionada será usada para organizar seu perfil dentro da plataforma.</p>
                        </div>
                    </div>
                </div>

                <div class="collaborator-create__footer">
                    <div>
                        <span><svg><use href="#collaborator-icon-check"></use></svg></span>
                        <p><strong>Perfil do colaborador</strong><small>Revise os dados antes de continuar.</small></p>
                    </div>

                    <button class="crud-create__btn" type="submit">
                        {{ !empty($colaborador->id) ? 'Salvar alterações' : 'Cadastrar colaborador' }}
                        <svg><use href="#collaborator-icon-arrow"></use></svg>
                    </button>
                </div>
            </fieldset>
        </form>

        <aside class="collaborator-create__aside" aria-label="Informações sobre o cadastro">
            <article class="collaborator-create__aside-main">
                <span><svg><use href="#collaborator-icon-briefcase"></use></svg></span>
                <small>SEU PERFIL PROFISSIONAL</small>
                <h2>Mostre sua atuação</h2>
                <p>Essas informações ajudam a identificar o profissional e organizar sua área de trabalho.</p>

                <ul>
                    <li><i><svg><use href="#collaborator-icon-check"></use></svg></i>Identificação do titular</li>
                    <li><i><svg><use href="#collaborator-icon-check"></use></svg></i>Contato atualizado</li>
                    <li><i><svg><use href="#collaborator-icon-check"></use></svg></i>Profissão vinculada</li>
                </ul>
            </article>

            <article class="collaborator-create__aside-tip">
                <span>!</span>
                <div>
                    <strong>Dica rápida</strong>
                    <p>Selecione a profissão que melhor representa sua principal atividade.</p>
                </div>
            </article>
        </aside>
    </div>
</section>
