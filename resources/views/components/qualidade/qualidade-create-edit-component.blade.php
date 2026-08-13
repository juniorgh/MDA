<section
    class="mda-cat"
    data-quality-editor
    data-editing="{{ !empty($qualidade->id) ? 'true' : 'false' }}"
    data-current-file-name="{{ !empty($qualidade->arquivo) ? basename($qualidade->arquivo) : '' }}"
>
    <header class="mda-cat__header">
        <div>
            <span class="mda-cat__eyebrow">PERFIL PROFISSIONAL</span>
            <h1 class="mda-cat__title">
                {{ !empty($qualidade->id) ? 'Editar qualificação' : 'Nova qualificação' }}
            </h1>
            <p class="mda-cat__subtitle">
                Informe sua formação, curso ou certificação profissional.
            </p>
        </div>
    </header>

    <div class="mda-cat__layout mda-cat__content">
        @if(!empty($qualidade->id))
            <form
                class="crud-create-form mda-cat__form"
                action="{{ route('qualidade.update', ['id' => $qualidade->id]) }}"
                method="POST"
                enctype="multipart/form-data"
                data-quality-form
                novalidate
            >
                @method('PUT')
        @else
            <form
                class="crud-create-form mda-cat__form"
                action="{{ route('qualidade.store') }}"
                method="POST"
                enctype="multipart/form-data"
                data-quality-form
                novalidate
            >
        @endif
            @csrf

            <fieldset class="crud-create-fset mda-cat__fieldset">
                <div class="crud-create-leg mda-cat__form-header">
                    <div class="crud-create-leg-left mda-cat__form-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none">
                            <path d="M6 3h9l3 3v15H6V3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M15 3v4h4M9 11h6M9 15h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <div class="crud-create-leg-right mda-cat__form-heading">
                        <h2 class="crud-create-leg-right__title mda-cat__form-title">
                            Dados da qualificação
                        </h2>
                        <p class="crud-create-leg-right__parag mda-cat__form-description">
                            Os campos com * são obrigatórios.
                        </p>
                    </div>
                </div>

                <div class="mda-cat__form-grid">
                    <div class="mda-cat__field mda-cat__field--full">
                        <label class="crud-create__lb mda-cat__label" for="titulo">
                            Título <em>*</em>
                        </label>
                        <input
                            class="crud-create__txt mda-cat__input"
                            type="text"
                            name="titulo"
                            id="titulo"
                            value="{{ old('titulo', $qualidade->titulo ?? '') }}"
                            placeholder="Ex.: Curso técnico em Eletricidade"
                            maxlength="120"
                            autocomplete="off"
                            data-title
                            data-validate
                            required
                        >

                        @error('titulo')
                            <small class="mda-cat__error" data-server-error>{{ $message }}</small>
                        @enderror
                        <small class="mda-cat__error" data-client-error hidden></small>
                    </div>

                    <div class="mda-cat__field mda-cat__field--full">
                        <label class="crud-create__lb mda-cat__label" for="instituicao">
                            Instituição <em>*</em>
                        </label>
                        <input
                            class="crud-create__txt mda-cat__input"
                            type="text"
                            name="instituicao"
                            id="instituicao"
                            value="{{ old('instituicao', $qualidade->instituicao ?? '') }}"
                            placeholder="Ex.: SENAI Paraná"
                            maxlength="120"
                            autocomplete="organization"
                            data-institution
                            data-validate
                            required
                        >

                        @error('instituicao')
                            <small class="mda-cat__error" data-server-error>{{ $message }}</small>
                        @enderror
                        <small class="mda-cat__error" data-client-error hidden></small>
                    </div>

                    <div class="mda-cat__field">
                        <label class="crud-create__lb mda-cat__label" for="ano_inicio">
                            Ano de início <em>*</em>
                        </label>
                        <input
                            class="crud-create__txt crud-create__txtpqn mda-cat__input"
                            type="number"
                            name="ano_inicio"
                            id="ano_inicio"
                            value="{{ old('ano_inicio', $qualidade->ano_inicio ?? '') }}"
                            placeholder="Ex.: 2022"
                            min="1900"
                            max="2100"
                            inputmode="numeric"
                            data-start-year
                            data-validate
                            required
                        >

                        @error('ano_inicio')
                            <small class="mda-cat__error" data-server-error>{{ $message }}</small>
                        @enderror
                        <small class="mda-cat__error" data-client-error hidden></small>
                    </div>

                    <div class="mda-cat__field">
                        <label class="crud-create__lb mda-cat__label" for="ano_fim">
                            Ano de conclusão
                        </label>
                        <input
                            class="crud-create__txt crud-create__txtpqn mda-cat__input"
                            type="number"
                            name="ano_fim"
                            id="ano_fim"
                            value="{{ old('ano_fim', $qualidade->ano_fim ?? '') }}"
                            placeholder="Em andamento"
                            min="1900"
                            max="2100"
                            inputmode="numeric"
                            data-end-year
                            data-validate
                        >
                        <small class="mda-cat__hint">Deixe vazio se ainda estiver cursando.</small>

                        @error('ano_fim')
                            <small class="mda-cat__error" data-server-error>{{ $message }}</small>
                        @enderror
                        <small class="mda-cat__error" data-client-error hidden></small>
                    </div>

                    <div class="mda-cat__field mda-cat__field--full">
                        <div class="mda-cat__label-row">
                            <label class="crud-create__lb mda-cat__label" for="descricao">
                                Descrição
                            </label>
                            <small class="mda-cat__counter" data-description-count>0 caracteres</small>
                        </div>

                        <textarea
                            class="crud-create__area mda-cat__textarea"
                            name="descricao"
                            id="descricao"
                            rows="6"
                            placeholder="Descreva os principais conhecimentos e atividades da qualificação."
                            data-description
                            data-validate
                        >{{ old('descricao', $qualidade->descricao ?? '') }}</textarea>

                        @error('descricao')
                            <small class="mda-cat__error" data-server-error>{{ $message }}</small>
                        @enderror
                        <small class="mda-cat__error" data-client-error hidden></small>
                    </div>

                    <div class="mda-cat__field mda-cat__field--full">
                        <label class="crud-create__lb mda-cat__label" for="arquivo">
                            Certificado ou comprovante
                        </label>

                        <div class="mda-cat__upload">
                            <input
                                class="crud-create__txt mda-cat__input mda-cat__file"
                                type="file"
                                name="arquivo"
                                id="arquivo"
                                accept=".pdf,.jpg,.jpeg,.png,.webp"
                                data-file
                                data-validate
                            >
                            <small class="mda-cat__hint" data-file-name>
                                PDF, JPG, PNG ou WEBP.
                            </small>
                        </div>

                        @error('arquivo')
                            <small class="mda-cat__error" data-server-error>{{ $message }}</small>
                        @enderror
                        <small class="mda-cat__error" data-client-error hidden></small>
                    </div>
                </div>

                <div class="mda-cat__actions">
                    <button
                        class="crud-create__btn mda-cat__submit"
                        type="submit"
                        data-submit
                    >
                        <span data-submit-label>
                            {{ !empty($qualidade->id) ? 'Salvar alterações' : 'Cadastrar qualificação' }}
                        </span>
                    </button>
                </div>
            </fieldset>
        </form>

        <aside class="mda-cat__aside" aria-label="Pré-visualização da qualificação">
            <div class="mda-cat__preview">
                <span class="mda-cat__preview-label">PRÉ-VISUALIZAÇÃO</span>

                <div class="mda-cat__preview-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none">
                        <path d="M8 3h8v4a4 4 0 0 1-8 0V3Z" stroke="currentColor" stroke-width="1.8"/>
                        <path d="M10 11 8.5 21 12 19l3.5 2L14 11" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                        <path d="M5 4h3M16 4h3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </div>

                <span class="mda-cat__preview-status is-active" data-preview-status>
                    Qualificação
                </span>

                <h2 class="mda-cat__preview-title" data-preview-title>
                    Título da qualificação
                </h2>
                <p class="mda-cat__preview-subtitle" data-preview-institution>
                    Nome da instituição
                </p>

                <div class="mda-cat__preview-details">
                    <div>
                        <small>Período</small>
                        <strong data-preview-period>Não informado</strong>
                    </div>
                    <div>
                        <small>Comprovante</small>
                        <strong data-preview-file>Nenhum arquivo</strong>
                    </div>
                </div>

                <p class="mda-cat__preview-description" data-preview-description>
                    A descrição aparecerá aqui.
                </p>
            </div>

            <div class="mda-cat__tip">
                <strong>Dica</strong>
                <p>Certificados aumentam a confiança do contratante no seu perfil.</p>
            </div>
        </aside>
    </div>
</section>