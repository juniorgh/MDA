@extends('layout.app-public')


@section('content')
    <x-colaborador.create-edit 
    :colaborador="$colaborador" 
    :profissoes="$profissoes" />
    />
@endsection