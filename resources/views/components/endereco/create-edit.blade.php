<section class="address-create">
    <svg class="address-create__sprite" aria-hidden="true" focusable="false">
        <symbol id="address-icon-pin" viewBox="0 0 24 24">
            <path d="M12 21s7-6.2 7-12A7 7 0 0 0 5 9c0 5.8 7 12 7 12Z"/>
            <circle cx="12" cy="9" r="2.4"/>
        </symbol>
        <symbol id="address-icon-home" viewBox="0 0 24 24">
            <path d="m3 11 9-8 9 8"/>
            <path d="M5 10v10h14V10M9 20v-6h6v6"/>
        </symbol>
        <symbol id="address-icon-shield" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/>
            <path d="m9 12 2 2 4-4"/>
        </symbol>
        <symbol id="address-icon-check" viewBox="0 0 24 24">
            <path d="m5 12 4 4L19 6"/>
        </symbol>
        <symbol id="address-icon-arrow" viewBox="0 0 24 24">
            <path d="M5 12h14M13 6l6 6-6 6"/>
        </symbol>
        <symbol id="address-icon-info" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 11v6M12 7.5v.1"/>
        </symbol>
    </svg>

    <header class="address-create__heading">
        <div>
            <span class="address-create__eyebrow">PERFIL DO CONTRATANTE</span>
            <h1>{{ !empty($endereco->id) ? 'Editar endereço' : 'Cadastrar endereço' }}</h1>
            <p>Informe o local utilizado nas solicitações e serviços da plataforma.</p>
        </div>

        <div class="address-create__security">
            <span><svg><use href="#address-icon-shield"></use></svg></span>
            <div>
                <strong>Dados protegidos</strong>
                <small>Informações vinculadas ao seu perfil</small>
            </div>
        </div>
    </header>

    <div class="address-create__layout">
        @if(!empty($endereco->id))
            <form class="crud-create-form address-create__form" action="{{ route('endereco.update', ['endereco' => $endereco->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
        @else
            <form class="crud-create-form address-create__form" action="{{ route('endereco.store') }}" method="POST" enctype="multipart/form-data">
        @endif
            @csrf

            <fieldset class="crud-create-fset address-create__fieldset">
                <legend class="address-create__sr-only">Dados do endereço</legend>

                <div class="crud-create-leg address-create__form-heading">
                    <div class="crud-create-leg-left address-create__form-icon">
                        <svg><use href="#address-icon-pin"></use></svg>
                    </div>

                    <div class="crud-create-leg-right">
                        <span class="address-create__step">CADASTRO DE ENDEREÇO</span>
                        <h4 class="crud-create-leg-right__title">Onde você está?</h4>
                        <p class="crud-create-leg-right__parag">Preencha os campos abaixo com os dados do seu endereço.</p>
                    </div>

                    <span class="address-create__status">
                        <i></i>
                        {{ !empty($endereco->id) ? 'Editando' : 'Novo cadastro' }}
                    </span>
                </div>

                <div class="address-create__body">
                    <div class="address-create__grid">
                        <div class="address-create__field address-create__field--logradouro {{ $errors->has('logradouro') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="logradouro">Logradouro</label>
                            <div class="address-create__input">
                                <svg><use href="#address-icon-home"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="logradouro"
                                    value="{{ $endereco->logradouro ?? old('logradouro') }}"
                                    id="logradouro"
                                    placeholder="Ex.: Rua das Palmeiras"
                                    autocomplete="address-line1"
                                >
                            </div>

                            @if($errors->has('logradouro'))
                                <small class="crud-create__error">{{ $errors->first('logradouro') }}</small>
                            @endif
                        </div>

                        <div class="address-create__field address-create__field--numero {{ $errors->has('numero') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="numero">Número</label>
                            <div class="address-create__input">
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="numero"
                                    value="{{ $endereco->numero ?? old('numero') }}"
                                    id="numero"
                                    placeholder="Ex.: 248"
                                    autocomplete="address-line2"
                                >
                            </div>

                            @if($errors->has('numero'))
                                <small class="crud-create__error">{{ $errors->first('numero') }}</small>
                            @endif
                        </div>

                        <div class="address-create__field address-create__field--complemento {{ $errors->has('complemento') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="complemento">
                                Complemento
                                <span>Opcional</span>
                            </label>

                            <div class="crud-create-fset-wropper-txt-small address-create__input">
                                <input
                                    class="crud-create__txt crud-create__txtpqn"
                                    type="text"
                                    name="complemento"
                                    id="complemento"
                                    value="{{ $endereco->complemento ?? old('complemento') }}"
                                    placeholder="Ex.: Apto 64, bloco B"
                                    autocomplete="address-line3"
                                >
                            </div>

                            @if($errors->has('complemento'))
                                <small class="crud-create__error">{{ $errors->first('complemento') }}</small>
                            @endif
                        </div>

                        <div class="address-create__field address-create__field--bairro {{ $errors->has('bairro') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="bairro">Bairro</label>
                            <div class="address-create__input">
                                <input
                                    type="text"
                                    class="crud-create__txt crud-create__txtpqn"
                                    placeholder="Ex.: Jardim Europa"
                                    value="{{ $endereco->bairro ?? old('bairro') }}"
                                    name="bairro"
                                    id="bairro"
                                >
                            </div>

                            @if($errors->has('bairro'))
                                <small class="crud-create__error">{{ $errors->first('bairro') }}</small>
                            @endif
                        </div>

                        <div class="address-create__field address-create__field--cidade {{ $errors->has('cidade') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="cidade">Cidade</label>
                            <div class="address-create__input">
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="cidade"
                                    value="{{ $endereco->cidade ?? old('cidade') }}"
                                    id="cidade"
                                    placeholder="Ex.: Curitiba"
                                    autocomplete="address-level2"
                                >
                            </div>

                            @if($errors->has('cidade'))
                                <small class="crud-create__error">{{ $errors->first('cidade') }}</small>
                            @endif
                        </div>

                        <div class="address-create__field address-create__field--estado {{ $errors->has('estado') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="estado">Estado</label>
                            <div class="address-create__input">
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="estado"
                                    value="{{ $endereco->estado ?? old('estado') }}"
                                    id="estado"
                                    placeholder="Ex.: PR"
                                    autocomplete="address-level1"
                                >
                            </div>

                            @if($errors->has('estado'))
                                <small class="crud-create__error">{{ $errors->first('estado') }}</small>
                            @endif
                        </div>

                        <div class="address-create__field address-create__field--cep {{ $errors->has('cep') ? 'has-error' : '' }}">
                            <label class="crud-create__lb" for="cep">CEP</label>
                            <div class="address-create__input">
                                <svg><use href="#address-icon-pin"></use></svg>
                                <input
                                    class="crud-create__txt"
                                    type="text"
                                    name="cep"
                                    value="{{ $endereco->cep ?? old('cep') }}"
                                    id="cep"
                                    placeholder="Ex.: 80000-000"
                                    autocomplete="postal-code"
                                    inputmode="numeric"
                                >
                            </div>

                            @if($errors->has('cep'))
                                <small class="crud-create__error">{{ $errors->first('cep') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="address-create__notice">
                        <span><svg><use href="#address-icon-info"></use></svg></span>
                        <div>
                            <strong>Confira antes de salvar</strong>
                            <p>Esses dados poderão ser utilizados para informar onde o serviço será realizado.</p>
                        </div>
                    </div>
                </div>

                <div class="address-create__footer">
                    <div>
                        <span><svg><use href="#address-icon-check"></use></svg></span>
                        <p><strong>Última etapa</strong><small>Revise os dados e conclua o cadastro.</small></p>
                    </div>

                    <button class="crud-create__btn" type="submit">
                        {{ !empty($endereco->id) ? 'Salvar alterações' : 'Cadastrar endereço' }}
                        <svg><use href="#address-icon-arrow"></use></svg>
                    </button>
                </div>
            </fieldset>
        </form>

        <aside class="address-create__aside" aria-label="Informações sobre o endereço">
            <article class="address-create__aside-main">
                <span><svg><use href="#address-icon-home"></use></svg></span>
                <small>SEU PERFIL</small>
                <h2>Complete seus dados</h2>
                <p>O endereço ajuda a organizar solicitações e conectar cada serviço ao local correto.</p>

                <ul>
                    <li><i><svg><use href="#address-icon-check"></use></svg></i>Informações centralizadas</li>
                    <li><i><svg><use href="#address-icon-check"></use></svg></i>Solicitações mais completas</li>
                    <li><i><svg><use href="#address-icon-check"></use></svg></i>Localização consistente</li>
                </ul>
            </article>

            <article class="address-create__aside-tip">
                <span>!</span>
                <div>
                    <strong>Dica rápida</strong>
                    <p>Use o endereço completo e informe o complemento somente quando necessário.</p>
                </div>
            </article>
        </aside>
    </div>
</section>
