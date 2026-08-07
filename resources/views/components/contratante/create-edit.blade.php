
@if(!empty($contratante->id))
    <form class="crud-create-form" action="{{ route('contratante.update',['contratante' => $contratante->id ]) }}" method="POST">
        @method('PUT')
@else
    @if($log == false)
        <form method="POST" action="{{ route('register') }}">
    @else
        <form class="crud-create-form" action="{{ route('contratante.store') }}" method="POST">
    @endif    
@endif
    @csrf
    <fieldset class="crud-create-fset">
        <legend class="crud-create-leg">Dados Pessoais</legend>

        <label class="crud-create__lb" class="crud-create__lb" for="nome">Primeiro Nome</label>
        <input class="crud-create__txt" type="text" name="name" value="{{ $contratante->user->name ?? old('name') }}" id="name" placeholder="Digite aqui seu nome">

        {{ $errors->has('name') ? $errors->first('name') : ''}}

        <label class="crud-create__lb" for="sobrenome">Sobrenome</label>
        <input class="crud-create__txt" type="text" name="sobrenome" value="{{ $contratante->user->sobrenome ?? old('sobrenome') }}" id="sobrenome" placeholder="Digite aqui seu sobrenome">

        {{ $errors->has('sobrenome') ? $errors->first('sobrenome') : ''}}

        <label class="crud-create__lb" for="cpf">CPF</label>
        <input class="crud-create__txt" type="text" name="cpf" id="cpf" value="{{ $contratante->cpf ?? old('cpf') }}" placeholder="Digite aqui seu CPF">

        {{ $errors->has('cpf') ? $errors->first('cpf') : ''}}

        <label class="crud-create__lb" for="telefone">Telefone</label>
        <input class="crud-create__txt" type="text" value="{{ $contratante->telefone ?? old('telefone') }}" name="telefone" id="telefone" placeholder="Digite aqui seu telefone">

        {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}

        <label class="crud-create__lb" for="email">E-mail</label>
        <input class="crud-create__txt" type="email" name="email" id="email" placeholder="Digite aqui seu E-mail" value="{{ $contratante->user->email ?? old('email') }}">

        {{ $errors->has('email') ? $errors->first('email') : ''}}

        <label class="crud-create__lb" for="email">Repita seu E-mail</label>
        <input class="crud-create__txt" type="email" name="email_validador" id="email" value="{{ $contratante->user->email ?? old('email_validador') }}" placeholder="Digite aqui seu E-mail novamente">

        {{ $errors->has('email') ? $errors->first('email') : ''}}

        <label class="crud-create__lb" for="password">Password</label>
        <input class="crud-create__txt" type="password" value="{{ $contratante->user->password ?? old('password') }}" name="password" placeholder="Digite sua senha">

        {{ $errors->has('password') ? $errors->first('password') : ''}}

        <input class="crud-create__txt" type="hidden" name="user_id" value="{{ $contratante->user_id ?? old('user_id') }}">

        @if(!empty($contratante->id))
            <label class="crud-create__lb" for="password_confirmation">Password</label>
            <input class="crud-create__txt" type="password" name="password_confirmation" id="password_confirmation" value="{{ $contratante->user->password ?? old('password') }}" placeholder="Digite novamente sua senha novamente">

            {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : ''}}
        @endif

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
