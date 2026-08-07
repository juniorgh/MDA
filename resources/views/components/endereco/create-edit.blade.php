    @if(!empty($endereco->id))
    <form class="crud-create-form" action="{{ route('endereco.update',['endereco' => $endereco->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    @else
        <form class="crud-create-form" action="{{ route('endereco.store') }}" method="POST" enctype="multipart/form-data">
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

        <label class="crud-create__lb" class="crud-create__lb" for="nome"> Logradouro </label>
        <input placeholder="Digite o Título" class="crud-create__txt" type="text" name="logradouro" value="{{ $endereco->logradouro ?? old('logradouro') }}" id="logradouro">

        {{ $errors->has('logradouro') ? $errors->first('logradouro') : ''}}

        <label class="crud-create__lb" for="numero"> Número </label>
        <input placeholder="Digite a instituição" class="crud-create__txt" type="text" name="numero" value="{{ $endereco->numero ?? old('numero') }}" id="numero">

        {{ $errors->has('numero') ? $errors->first('numero') : ''}}

        <label class="crud-create__lb" for="complemento"> Complemento </label>

        <div class="crud-create-fset-wropper-txt-small">

            <input class="crud-create__txt crud-create__txtpqn" type="text" min="1900" max="2100" placeholder="digite o ano de início" name="complemento" id="complemento" value="{{ $endereco->complemento ?? old('complemento') }}" >
        </div>

        {{ $errors->has('complemento') ? $errors->first('complemento') : ''}}

        <label class="crud-create__lb" for="bairro"> Bairro </label>
            <input type="text" class="crud-create__txt crud-create__txtpqn" min="1900"
           placeholder="digite o ano de conclusão" value="{{ $endereco->bairro ?? old('bairro') }}" name="bairro" id="bairro">

           {{ $errors->has('bairro') ? $errors->first('bairro') : ''}}

        <label class="crud-create__lb" for="cidade"> Cidade </label>

        <input placeholder="Digite a cidade" class="crud-create__txt" type="text" name="cidade" value="{{ $endereco->cidade ?? old('cidade') }}" id="cidade"/>

        {{ $errors->has('cidade') ? $errors->first('cidade') : ''}}

        <label class="crud-create__lb" for="estado"> Estado </label>

        <input placeholder="Digite o estado" class="crud-create__txt" type="text" name="estado" value="{{ $endereco->estado ?? old('estado') }}" id="estado"/>

        {{ $errors->has('estado') ? $errors->first('estado') : ''}}

        <label class="crud-create__lb" for="cep"> CEP </label>

        <input placeholder="Digite o número" class="crud-create__txt" type="text" name="cep" value="{{ $endereco->cep ?? old('cep') }}" id="cep"/>

        {{ $errors->has('cep') ? $errors->first('cep') : ''}}


        <button class="crud-create__btn" type="submit">
            Cadastrar
        </button>
    </fieldset>
</form>