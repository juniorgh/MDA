@extends('layout.app-public')

@section('content')
    <x-contratante.create-edit 
    :contratante="$contratante" 
    :log="$log"
    />
@endsection