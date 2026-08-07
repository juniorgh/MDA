@extends('layout.app-public')
@section('content')

<main class="profile-page">

    <div class="breadcrumb">
        <a href="#">Contratante</a>
        <span>/</span>
        <strong>Perfil</strong>
    </div>

    <section class="profile-hero">
            <div class="profile-main">
                <div class="avatar-box">
                    <img src="https://i.pravatar.cc/300?img=12" alt="Foto do colaborador">
                    <span class="verified">✓</span>
                </div>

                <div class="profile-info">
                    <span class="status active">Ativo</span>
                    <h1> {{ $contratante->name }} {{ $contratante->sobrenome }}</h1>
                    <p> Perfil verificado • Membro desde Julho de 2026 </p>
                    <div class="profile-meta">
                        <span>📍 {{ $contratante->endereco->cidade }} {{ $contratante->endereco->estado }} </span>
                        <span>⭐ 4.9</span>
                        <span>📋 127 avaliações</span>
                        {{-- <span>Membro desde {{ $colaborador->user->created_at->format('m/Y') }}</span> --}}
                    </div>
                </div>
            </div>

        <div class="profile-actions">
            <a href="{{ route('contratante.edit',['contratante' => $contratante->contratante->id ]) }}" class="btn-gold">Editar Perfil</a>
            <a href="#" class="btn-dark">Bloquear</a>
        </div>

    </section>  

    <section class="tabs">
        <a href="#">Serviços</a>
        <a href="#">Avaliações</a>
        {{-- <a href="{{ route('endereco.create') }}"> Editar endereçamento </a> --}}
        @if(!empty($contratante->endereco->id))
            <a href="{{ route('endereco.edit', ['endereco' => $contratante->endereco->id ]) }}"> Editar endereçamento </a>
        @else
            <a href="{{ route('endereco.create') }}"> Cadastrar endereçamento </a>
        @endif
    </section>

    <section class="stats-grid">
        <div class="stat-card">
            <span>Serviços realizados</span>
            <strong>184</strong>
            <small>+12 este mês</small>
        </div>

        <div class="stat-card">
            <span>Avaliação média</span>
            <strong>4.9</strong>
            <small>127 avaliações</small>
        </div>

        <div class="stat-card">
            <span>Qualificações</span>
{{--             <strong> {{ $colaborador->qualificacoes->count() }} </strong>
            <small> {{ $colaborador->qualificacoes->count() }} com arquivo</small>
 --}}   </div>

        <div class="stat-card">
            <span>Taxa de aprovação</span>
            <strong>98%</strong>
            <small>Excelente desempenho</small>
        </div>
    </section>

    <section class="content-grid">

        <div class="left-column">

            <div class="card">
                <div class="card-head">
                    <h2>Sobre o colaborador (incluir mais um campo de descrição) </h2>
                </div>

                <p>
                    Profissional com experiência em instalações elétricas residenciais,
                    manutenção preventiva, pequenos reparos e projetos fotovoltaicos.
                    Atua com foco em segurança, pontualidade e acabamento.
                </p>

                <div class="tags">+ Adicionar
{{--                         @foreach($colaborador->qualificacoes as $qualidades_tags)

                                @php
                                $aux_tag = explode(" ", $qualidades_tags->titulo);                            

                                $tag = $aux_tag[0]; //tag isolada
                                @endphp
                            
                                <span> {{ $tag }} </span>
                        @endforeach
 --}}                </div>
            </div>
            

            <div class="card">
                <div class="card-head">
                    <h2>Últimos serviços solicitados</h2>
                    <a href="#">Ver todos</a>
                </div>

                <div class="service-item">
                    <strong>Instalação elétrica residencial</strong>
                    <span>Finalizado</span>
                    <small>Contratante: João Martins • 15/02/2026</small>
                </div>

                <div class="service-item">
                    <strong>Troca de disjuntores</strong>
                    <span>Finalizado</span>
                    <small>Contratante: Ana Paula • 08/02/2026</small>
                </div>
            </div>

        </div>

        <aside class="right-column">

            <div class="card">
                <div class="card-head">
                    <h2>Informações</h2>
                </div>

                <div class="info-row">
                    <span>CPF</span>
                    <strong> {{ $contratante->contratante->cpf }}</strong>
                </div>

                <div class="info-row">
                    <span>Telefone</span>
                    <strong> {{ $contratante->contratante->telefone }} </strong>
                </div>

                <div class="info-row">
                    <span>E-mail</span>
                    <strong>{{ $contratante->email }}</strong>
                </div>

                {{-- <div class="info-row"> --}}
                    {{-- <span>Pix</span> --}}
                    {{-- @if($pix_bool == true) --}}
                        {{-- <strong> Cadastrado </strong> --}}
                    {{-- @else --}}
                        {{-- <strong> Não cadastrado </strong> --}}
                    {{-- @endif --}}
                {{-- </div> --}}

                <div class="info-row">
                    <span>Último acesso</span>
                    <strong>Hoje às 09:42</strong>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Pendências</h2>
                </div>

                <div class="alert-item warning">
                    Certificado NR-10 vence em 40 dias.
                </div>

                <div class="alert-item success">
                    Conta verificada.
                </div>

                <div class="alert-item success">
                    Telefone confirmado.
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Avaliações recentes</h2>
                </div>

                <div class="review">
                    <strong>★★★★★</strong>
                    <p>Excelente profissional, pontual e muito caprichoso.</p>
                    <small>Maria Souza</small>
                </div>

                <div class="review">
                    <strong>★★★★★</strong>
                    <p>Resolveu o problema rapidamente.</p>
                    <small>Carlos Lima</small>
                </div>
            </div>

        </aside>

    </section>

</main>

@endsection