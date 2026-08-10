@if(!empty($colaborador->id))
    <form class="crud-create-form" action="{{ route('colaborador.update',['colaborador' => $colaborador->id ]) }}" method="POST">
     @method('PUT')
@else

    <form class="crud-create-form" action="{{ route('colaborador.store') }}" method="POST">
@endif
    @csrf
    <fieldset class="crud-create-fset">
        <legend class="crud-create-leg">Dados Pessoais</legend>

        <label class="crud-create__lb" for="cpf">CPF</label>
        <input class="crud-create__txt" type="text" name="cpf" id="cpf" value="{{ $colaborador->cpf ?? old('cpf') }}" placeholder="Digite aqui seu CPF">

        {{ $errors->has('cpf') ? $errors->first('cpf') : ''}}

        <label class="crud-create__lb" for="telefone">Telefone</label>
        <input class="crud-create__txt" type="text" value="{{ $colaborador->telefone ?? old('telefone') }}" name="telefone" id="telefone" placeholder="Digite aqui seu telefone">

        {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}

        <label class="crud-create__lb" for="chave_pix">Chave Pix</label>
        <input class="crud-create__txt" type="text" name="chave_pix" id="chave_pix" value="{{ $colaborador->chave_pix ?? old('chave_pix') }}" placeholder="Digite aqui sua chave PIX">

        <label class="crud-create__lb" for="profissao_id"> Profissões disponíveis </label>


        <select class="crud-create__txt" name="profissao_id" id="profissao_id" >
            <option> SELECIONE </option>

            @foreach($profissoes as $profissao)
                <option value="{{ $profissao->id }}"> {{ $profissao->nome }} </option>
            @endforeach
        </select>

        {{ $errors->has('profissao_id') ? $errors->first('profissao_id') : ''}}

        <button class="crud-create__btn" type="submit">
            Cadastrar
        </button>
    </fieldset>
</form>
