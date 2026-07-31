@extends('layout.app-public')
@section('content')
    <x-colaborador.create-edit 
    :user_id="$user_id" 
    :profissoes="$profissoes" />
@endsection