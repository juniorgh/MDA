{{-- 
@if(!empty($contratante->id))
    <form class="crud-create-form" action="{{ route('contratante.update',['contratante' => $contratante->id ]) }}" method="POST">
        @method('PUT')
@else
    <form class="crud-create-form" action="{{ route('contratante.store') }}" method="POST">
@endif
    @csrf
    <fieldset class="crud-create-fset">
        <legend class="crud-create-leg">Dados Pessoais</legend>


        <label class="crud-create__lb" for="cpf">CPF</label>
        <input class="crud-create__txt" type="text" name="cpf" id="cpf" value="{{ $contratante->cpf ?? old('cpf') }}" placeholder="Digite aqui seu CPF">

        {{ $errors->has('cpf') ? $errors->first('cpf') : ''}}

        <label class="crud-create__lb" for="telefone">Telefone</label>
        <input class="crud-create__txt" type="text" value="{{ $contratante->telefone ?? old('telefone') }}" name="telefone" id="telefone" placeholder="Digite aqui seu telefone">

        {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}

        <label class="crud-create__lb" for="chave_pix"> Data de Nascimento </label>
        <input class="crud-create__txt" type="date" name="data_nascimento" id="data_nascimento" value="{{ $contratante->data_nascimento ?? old('data_nascimento') }}">

        {{ $errors->has('data_nascimento') ? $errors->first('data_nascimento') : ''}}        

        <label class="crud-create__lb" for="foto"> Foto </label>
        <input class="crud-create__txt" type="text" name="foto" id="foto" value="{{ $contratante->foto ?? old('foto') }}" placeholder="Digite aqui sua chave PIX">

        {{ $errors->has('foto') ? $errors->first('foto') : ''}}

        <button class="crud-create__btn" type="submit">
            Cadastrar
        </button>
    </fieldset>
</form>
 --}}

 <section class="contractor-create">
    <svg class="contractor-create__sprite" aria-hidden="true" focusable="false">
        <symbol id="contractor-icon-user" viewBox="0 0 24 24">
            <circle cx="12" cy="8" r="4"/>
            <path d="M4 21a8 8 0 0 1 16 0"/>
        </symbol>
        <symbol id="contractor-icon-shield" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/>
            <path d="m9 12 2 2 4-4"/>
        </symbol>
        <symbol id="contractor-icon-card" viewBox="0 0 24 24">
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="M3 9h18M7 14h4"/>
        </symbol>
        <symbol id="contractor-icon-phone" viewBox="0 0 24 24">
            <path d="M8.5 3H5a2 2 0 0 0-2 2c0 8.8 7.2 16 16 16a2 2 0 0 0 2-2v-3.5l-4-1-1.5 2.5a13 13 0 0 1-8.5-8.5L9.5 7l-1-4Z"/>
        </symbol>
        <symbol id="contractor-icon-calendar" viewBox="0 0 24 24">
            <rect x="3" y="5" width="18" height="16" rx="2"/>
            <path d="M8 3v4M16 3v4M3 10h18"/>
        </symbol>
        <symbol id="contractor-icon-image" viewBox="0 0 24 24">
            <rect x="3" y="3" width="18" height="18" rx="2"/>
            <circle cx="9" cy="9" r="2"/>
            <path d="m21 15-5-5L5 21"/>
        </symbol>
        <symbol id="contractor-icon-check" viewBox="0 0 24 24">
            <path d="m5 12 4 4L19 6"/>
        </symbol>
        <symbol id="contractor-icon-arrow" viewBox="0 0 24 24">
            <path d="M5 12h14M13 6l6 6-6 6"/>
        </symbol>
        <symbol id="contractor-icon-info" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 11v6M12 7.5v.1"/>
        </symbol>
    </svg>

    <header class="contractor-create__heading">
        <div>
            <span class="contractor-create__eyebrow">PERFIL DO CONTRATANTE</span>
            <h1>{{ !empty($contratante->id) ? 'Editar dados pessoais' : 'Complete seu cadastro' }}</h1>
            <p>Mantenha seus dados atualizados para solicitar e acompanhar serviços.</p>
        </div>

        <div class="contractor-create__security">
            <span><svg><use href="#contractor-icon-shield"></use></svg></span>
            <div>
                <strong>Dados protegidos</strong>
                <small>Informações vinculadas ao seu perfil</small>
            </div>
        </div>
    </header>

    <div class="contractor-create__layout">
        @if(!empty($contratante->id))
            <form class="crud-create-form contractor-create__form" action="{{ route('contratante.update', ['contratante' => $contratante->id]) }}" method="POST">
                @method('PUT')
        @else
            <form class="crud-create-form contractor-create__form" action="{{ route('contratante.store') }}" method="POST">
        @endif
            @csrf

            <fieldset class="crud-create-fset contractor-create__fieldset">
                <legend class="contractor-create__sr-only">Dados pessoais</legend>

                <div class="crud-create-leg contractor-create__form-heading">
                    <div class="crud-create-leg-left contractor-create__form-icon">
                        <svg><use href="#contractor-icon-user"></use></svg>
                    </div>

                    <div class="crud-create-leg-right">
                        <span class="contractor-create__step">DADOS PESSOAIS</span>
                        <h4 class="crud-create-leg-right__title">Informações do contratante</h4>
                        <p class="crud-create-leg-right__parag">Preencha os dados utilizados na identificação e no contato.</p>
                    </div>

                    <span class="contractor-create__status">
                        <i></i>
                        {{ !empty($contratante->id) ? 'Editando' : 'Novo cadastro' }}
                    </span>
                </div>

                <div class="contractor-create__body">
                    <div class="contractor-create__grid">
                        <div class="contractor-create__field contractor-create__field--cpf {{ $errors->has('cpf') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="cpf">CPF</label>
                            <div class="contractor-create__input">
                                <svg><use href="#contractor-icon-card"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="cpf"
                                    id="cpf"
                                    value="{{ $contratante->cpf ?? old('cpf') }}"
                                    placeholder="Ex.: 000.000.000-00"
                                    inputmode="numeric"
                                    autocomplete="off"
                                >
                            </div>

                            @if($errors->has('cpf'))
                                <small class="crud-create__error">{{ $errors->first('cpf') }}</small>
                            @endif
                        </div>

                        <div class="contractor-create__field contractor-create__field--telefone {{ $errors->has('telefone') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="telefone">Telefone</label>
                            <div class="contractor-create__input">
                                <svg><use href="#contractor-icon-phone"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    value="{{ $contratante->telefone ?? old('telefone') }}"
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

                        <div class="contractor-create__field contractor-create__field--nascimento {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="data_nascimento">Data de nascimento</label>
                            <div class="contractor-create__input">
                                <svg><use href="#contractor-icon-calendar"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="date"
                                    name="data_nascimento"
                                    id="data_nascimento"
                                    value="{{ $contratante->data_nascimento ?? old('data_nascimento') }}"
                                    autocomplete="bday"
                                >
                            </div>

                            @if($errors->has('data_nascimento'))
                                <small class="crud-create__error">{{ $errors->first('data_nascimento') }}</small>
                            @endif
                        </div>

                        <div class="contractor-create__field contractor-create__field--foto {{ $errors->has('foto') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="foto">
                                Foto
                                <span>Opcional</span>
                            </label>
                            <div class="contractor-create__input">
                                <svg><use href="#contractor-icon-image"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="foto"
                                    id="foto"
                                    value="{{ $contratante->foto ?? old('foto') }}"
                                    placeholder="Cole aqui o endereço da sua foto"
                                    autocomplete="url"
                                >
                            </div>

                            @if($errors->has('foto'))
                                <small class="crud-create__error">{{ $errors->first('foto') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="contractor-create__notice">
                        <span><svg><use href="#contractor-icon-info"></use></svg></span>
                        <div>
                            <strong>Confira suas informações</strong>
                            <p>CPF, telefone e data de nascimento devem pertencer ao titular da conta.</p>
                        </div>
                    </div>
                </div>

                <div class="contractor-create__footer">
                    <div>
                        <span><svg><use href="#contractor-icon-check"></use></svg></span>
                        <p><strong>Perfil do contratante</strong><small>Revise os dados antes de continuar.</small></p>
                    </div>

                    <button class="crud-create__btn" type="submit">
                        {{ !empty($contratante->id) ? 'Salvar alterações' : 'Cadastrar contratante' }}
                        <svg><use href="#contractor-icon-arrow"></use></svg>
                    </button>
                </div>
            </fieldset>
        </form>

        <aside class="contractor-create__aside" aria-label="Informações sobre o cadastro">
            <article class="contractor-create__aside-main">
                <span><svg><use href="#contractor-icon-user"></use></svg></span>
                <small>SEU PERFIL</small>
                <h2>Comece pelo essencial</h2>
                <p>Essas informações identificam o contratante e tornam a comunicação mais segura.</p>

                <ul>
                    <li><i><svg><use href="#contractor-icon-check"></use></svg></i>Identificação do titular</li>
                    <li><i><svg><use href="#contractor-icon-check"></use></svg></i>Contato atualizado</li>
                    <li><i><svg><use href="#contractor-icon-check"></use></svg></i>Perfil mais completo</li>
                </ul>
            </article>

            <article class="contractor-create__aside-tip">
                <span>!</span>
                <div>
                    <strong>Dica rápida</strong>
                    <p>Use informações reais e confira o telefone antes de salvar.</p>
                </div>
            </article>
        </aside>
    </div>
</section>
