@if(!empty($colaborador->id))
    <form class="crud-create-form" action="{{ route('colaborador.update',['colaborador' => $colaborador->id ]) }}" method="POST">
        @csrf
        @method('PUT')
@else
    <form class="crud-create-form" action="{{ route('colaborador.store') }}" method="POST">

@endif
    <fieldset class="crud-create-fset">
        <legend class="crud-create-leg">Dados Pessoais</legend>

        <label class="crud-create__lb" class="crud-create__lb" for="nome">Primeiro Nome</label>
        <input class="crud-create__txt" type="text" name="name" value="{{ $colaborador->user->name ?? old('name') }}" id="name" placeholder="Digite aqui seu nome">

        {{ $errors->has('name') ? $errors->first('name') : ''}}

        <label class="crud-create__lb" for="sobrenome">Sobrenome</label>
        <input class="crud-create__txt" type="text" name="sobrenome" value="{{ $colaborador->user->sobrenome ?? old('sobrenome') }}" id="sobrenome" placeholder="Digite aqui seu sobrenome">

        {{ $errors->has('sobrenome') ? $errors->first('sobrenome') : ''}}

        <label class="crud-create__lb" for="cpf">CPF</label>
        <input class="crud-create__txt" type="text" name="cpf" id="cpf" value="{{ $colaborador->cpf ?? old('cpf') }}" placeholder="Digite aqui seu CPF">

        {{ $errors->has('cpf') ? $errors->first('cpf') : ''}}

        <label class="crud-create__lb" for="telefone">Telefone</label>
        <input class="crud-create__txt" type="text" value="{{ $colaborador->telefone ?? old('telefone') }}" name="telefone" id="telefone" placeholder="Digite aqui seu telefone">

        {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}

        <label class="crud-create__lb" for="email">E-mail</label>
        <input class="crud-create__txt" type="email" name="email" id="email" placeholder="Digite aqui seu E-mail" placeholder="Digite aqui seu E-mail">

        {{ $errors->has('email') ? $errors->first('email') : ''}}

        <label class="crud-create__lb" for="email">Repita seu E-mail</label>
        <input class="crud-create__txt" type="email_validador" name="email_validador" id="email" value="{{ $colaborador->user->email ?? (old('email_validador') ?? '') }}" placeholder="Digite aqui seu E-mail novamente">

        {{ $errors->has('email') ? $errors->first('email') : ''}}

        <label class="crud-create__lb" for="password">Password</label>
        <input class="crud-create__txt" type="password" name="password" placeholder="Digite sua senha">

        {{ $errors->has('password') ? $errors->first('password') : ''}}

        <input class="crud-create__txt" type="hidden" name="user_id" value="{{ $user_id ?? old('user_id') }}">

        @if(!empty($colaborador->id))
            <label class="crud-create__lb" for="password_confirmation">Password</label>
            <input class="crud-create__txt" type="password" name="password_confirmation" id="password_confirmation" value="" placeholder="Digite novamente sua senha novamente">

            {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : ''}}
        @endif

        <label class="crud-create__lb" for="chave_pix">Chave Pix</label>
        <input class="crud-create__txt" type="text" name="chave_pix" id="chave_pix" value="{{ $colaborador->chave_pix ?? old('chave_pix') }}" placeholder="Digite aqui sua chave PIX">

        <label class="crud-create__lb" for="profissao_id"> Profissões disponíveis </label>

        {{-- <input class="crud-create__txt" type="text" name="profissao_id" id="profissao_id" value="{{ $colaborador->profissao_id ?? old('profissao_id') }}" placeholder="Digite aqui sua chave PIX"> --}}

        <select class="crud-create__txt" name="" id="profissao_id" id="profissao_id" >
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
