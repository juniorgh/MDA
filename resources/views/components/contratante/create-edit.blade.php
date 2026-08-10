
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
