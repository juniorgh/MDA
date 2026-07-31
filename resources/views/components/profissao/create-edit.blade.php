@if(!empty($profissao->id))
    <form class="crud-create-form" action="{{ route('profissao.update',['profissao' => $profissao->id ]) }}" method="POST">
        @method('PUT')
@else
{{-- {{ dd($profissao->id) }} --}}
    <form class="crud-create-form" action="{{ route('profissao.store') }}" method="POST">
@endif
    @csrf
    <fieldset class="crud-create-fset">
        <legend class="crud-create-leg">Dados Pessoais</legend>

        <label class="crud-create__lb" class="crud-create__lb" for="nome">Nome</label>
        <input class="crud-create__txt" type="text" name="nome" value="{{ $profissao->nome ?? old('nome') }}" id="nome">

        {{ $errors->has('nome') ? $errors->first('nome') : ''}}

{{--         <label class="crud-create__lb" for="slug">Slug</label>
        <input class="crud-create__txt" type="text" name="slug" value="{{ $profissao->slug ?? old('slug') }}" id="slug">

        {{ $errors->has('slug') ? $errors->first('slug') : ''}} --}}



        <label class="crud-create__lb" for="descricao">descricao</label>
        <input class="crud-create__txt" type="text" name="descricao" id="descricao" value="{{ $profissao->descricao ?? old('descricao') }}" >

        {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}

        <label class="crud-create__lb" for="icone">Icone</label>
        <input class="crud-create__txt" type="text" value="{{ $profissao->icone ?? old('icone') }}" name="icone" id="icone">

        {{ $errors->has('icone') ? $errors->first('icone') : ''}}

        <input class="crud-create__txt" type="hidden" name="ativo" id="ativo" value="1">

        <label class="crud-create__lb" for="ordem">Ordem</label>
        <input class="crud-create__txt" type="ordem" name="ordem" id="ordem" value="{{ $profissao->ordem ?? old('ordem') }}">

        {{ $errors->has('ordem') ? $errors->first('ordem') : ''}}

        <button class="crud-create__btn" type="submit">
            Cadastrar
        </button>
    </fieldset>
</form>