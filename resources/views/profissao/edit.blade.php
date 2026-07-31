@extends('layout.app-public')


@section('content')
    <x-profissao.create-edit 
        :profissao="$profissao" 
    />
@endsection