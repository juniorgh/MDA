@extends('layout.app-public')

@section('content')
    <x-endereco.create-edit 
    :endereco="$endereco" 
    />
@endsection