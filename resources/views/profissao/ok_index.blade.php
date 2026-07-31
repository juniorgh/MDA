@extends('layout.app-public')
@section('content')
	@if(session('profissao_create_success'))
	    <div>
	        {{ session('success') }}
	    </div>
	@endif


    <table class="informativo-cursos" id="table-crud-index">
        <caption class="agenda-table-cap">
            <label for="busca"> pesquisar </label>
            <input type="text" id="buscar">
            <a href="{{ route('profissao.create') }}" alt="novo" class="agenda-table-cap__link"> Add +</a>
        </caption>
        <thead class="agenda-table-thead">
            <tr class="agenda-table__row">
                <th class="agenda-table-th">Nome</th>
                <th class="agenda-table-th">Slug</th>
                <th class="agenda-table-th">Descricao</th>
                <th class="agenda-table-th">Icone</th>
                <th class="agenda-table-th">Ativo</th>
                <th class="agenda-table-th">Ordem</th>
                <th class="agenda-table-th"> Visualizar </th>
                <th class="agenda-table-th"> Editar </th>
                <th class="agenda-table-th"> Excluir </th>
            </tr>
        </thead>
        <tbody class="agenda-table-body">
            @foreach($profissoes as $profissao)
                <tr class="agenda-table-body-tr" id="agenda-table-body-tr">
                    <td class="agenda-table-td"> {{ $profissao->nome }} </td>
                    <td class="agenda-table-td"> {{ $profissao->slug }} </td>
                    <td class="agenda-table-td"> {{ $profissao->descricao }} </td>
                    <td class="agenda-table-td status pending"> {{ $profissao->icone }} </td>
                    <td class="agenda-table-td"> {{ $profissao->ativo }} </td>

                    <td class="agenda-table-td"> <a class="index-table-td__show" href="#" alt='xxx'> view </a></td>
                    <td class="agenda-table-td"> <a class="index-table-td__edit" href="{{ route('profissao.edit',['profissao' => $profissao->id ]) }}" alt='xxx'> edit </a></td>
                    <td class="agenda-table-td">
                        <form class="form-btn-exc" action="">
                            @csrf
                            <button class="form-btn-exc__btn" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="12">
                </td>
            </tr>
        </tfoot>
    </table>


@endsection