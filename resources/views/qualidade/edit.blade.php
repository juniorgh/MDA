@extends('layout.app-public')


@section('content')
    <x-qualidade.create-edit :qualidade="$qualidade" />
@endsection