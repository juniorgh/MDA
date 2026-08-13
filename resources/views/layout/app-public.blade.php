<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> MDA </title>

    {{-- css --}}

    <!-- Fonts -->
{{--         <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 --}}


    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

     {{-- index elaborados dos cruds --}}
    <link rel="stylesheet" href="{{ asset('assets/css/colaborador/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colaborador/show.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/profissao/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/servico/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/servico/create.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/qualidade/index.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/crud/create.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/crud/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/_partials/menu.css') }}">

    {{-- javascript --}}
    {{-- <script src="{{ asset('assets/js/crud/index.js' defer) }}"></script> --}}
    {{-- defer carrega no final do bory --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body>
    <div class="mda-shell" data-mda-shell>

        @include('_partials.menu')

        <main class="mda-content">
            @yield('content')
        </main>

    </div>

    <script src="{{ asset('assets/js/_partials/menu.js') }}" defer> </script>
    <script src="{{ asset('assets/js/crud/create.js') }}"></script>
    <script src="{{ asset('assets/js/crud/mascaras.js') }}"></script>
    <script src="{{ asset('assets/js/utilidades/index.js') }}"></script>
    <script src="{{ asset('assets/js/servico/index.js') }}"></script>
    <script src="{{ asset('assets/js/servico/create.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/colaborador/index.js') }}"></script>
</body>
</html>