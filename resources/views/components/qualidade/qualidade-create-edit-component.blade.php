@if(!empty($qualidade->id))
    <form class="crud-create-form" action="{{ route('qualidade.update',['id' => $qualidade->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
@else
    <form class="crud-create-form" action="{{ route('qualidade.store') }}" method="POST" enctype="multipart/form-data">
@endif
    <fieldset class="crud-create-fset">
        <div class="crud-create-leg">
            <div class="crud-create-leg-left">
                
            </div>
            <div class="crud-create-leg-right">
                <h4 class="crud-create-leg-right__title"> Dados Pessoais</h4>
                <p class="crud-create-leg-right__parag"> Preencha suas informações pessoais</p>
            </div>
        </div>

        <label class="crud-create__lb" class="crud-create__lb" for="nome">Titulo </label>
        <input placeholder="Digite o Título" class="crud-create__txt" type="text" name="titulo" value="{{ $qualidade->titulo ?? old('titulo') }}" id="titulo">

        {{ $errors->has('titulo') ? $errors->first('titulo') : ''}}

        <label class="crud-create__lb" for="instituicao">Instituicao</label>
        <input placeholder="Digite a instituição" class="crud-create__txt" type="text" name="instituicao" value="{{ $qualidade->instituicao ?? old('instituicao') }}" id="instituicao">

        {{ $errors->has('instituicao') ? $errors->first('instituicao') : ''}}

        <label class="crud-create__lb" for="ano_inicio">Ano de início </label>

        <div class="crud-create-fset-wropper-txt-small">

            <input class="crud-create__txt crud-create__txtpqn" type="text" min="1900" max="2100" placeholder="digite o ano de início" name="ano_inicio" id="ano_inicio" value="{{ $qualidade->ano_inicio ?? old('ano_inicio') }}" >
        </div>

        {{ $errors->has('ano_inicio') ? $errors->first('ano_inicio') : ''}}

        <label class="crud-create__lb" for="ano_fim">Ano de conlcusão </label>
            <input type="text" class="crud-create__txt crud-create__txtpqn" min="1900"
           max="2100" placeholder="digite o ano de conclusão" value="{{ $qualidade->ano_fim ?? old('ano_fim') }}" name="ano_fim" id="ano_fim">

           {{ $errors->has('ano_fim') ? $errors->first('ano_fim') : ''}}

        <label class="crud-create__lb" for="descricao">Descrição </label>

        <textarea for="descricao" class="crud-create__area" name="descricao" id="descricao"cols="30" rows="6" value="{{ $qualidade->descricao ?? old('descricao') }}"></textarea>

        {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}

        <label class="crud-create__lb" for="descricao">Descrição </label>
        <input class="crud-create__txt" type="file" name="arquivo" id="arquivo" value="{{ $qualidade->arquivo ?? old('arquivo') }}">

        {{ $errors->has('arquivo') ? $errors->first('arquivo') : ''}}

        {{-- <label class="crud-create__lb" for="email">Pontos invisivel </label> --}}
        {{-- <input class="crud-create__txt" type="hidden" name="colaborador_id" value="{{ $id }}"> --}}


        <button class="crud-create__btn" type="submit">
            Cadastrar
        </button>
    </fieldset>
</form>