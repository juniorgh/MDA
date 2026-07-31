@extends('layout.app-public')
@section('content')

<main class="profile-page">

    <div class="breadcrumb">
        <a href="#">Colaboradores</a>
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
                    <h1> {{ $colaborador->user->name }} {{ $colaborador->user->sobrenome }}</h1>
                    <p>Eletricista Residencial e Instalador Fotovoltaico</p>

                    <div class="profile-meta">
                        <span>📍 Curitiba, PR</span>
                        <span>⭐ 4.9</span>
                        <span>127 avaliações</span>
                        <span>Membro desde Jan/2024</span>
                    </div>
                </div>
            </div>

        <div class="profile-actions">
            <a href="{{ route('colaborador.edit',['colaborador' => $colaborador->id ]) }}" class="btn-gold">Editar Perfil</a>
            <a href="#" class="btn-dark">Bloquear</a>
        </div>

    </section>  

    <section class="tabs">
        <a href="#" class="active">Visão Geral</a>
        <a href="{{ route('profissao.index') }}">Profissões</a>
        <a href="#">Qualificações</a>
        <a href="#">Serviços</a>
        <a href="#">Avaliações</a>
        <a href="#">Documentos</a>
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
            <strong>12</strong>
            <small>8 com arquivo</small>
        </div>

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
                    <h2>Sobre o colaborador</h2>
                </div>

                <p>
                    Profissional com experiência em instalações elétricas residenciais,
                    manutenção preventiva, pequenos reparos e projetos fotovoltaicos.
                    Atua com foco em segurança, pontualidade e acabamento.
                </p>

                <div class="tags">
                    <span>Elétrica</span>
                    <span>NR-10</span>
                    <span>NR-35</span>
                    <span>Fotovoltaico</span>
                    <span>Residencial</span>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Profissões</h2>
                    <a href="#">+ Adicionar</a>
                </div>

                <div class="list-item">
                    <div>
                        <strong>Eletricista Residencial</strong>
                        <small>Profissão principal</small>
                    </div>
                    <span class="pill gold">Principal</span>
                </div>

                <div class="list-item">
                    <div>
                        <strong>Instalador Fotovoltaico</strong>
                        <small>Energia solar residencial</small>
                    </div>
                    <span class="pill">Ativo</span>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Qualificações</h2>
                    <a href="#">+ Adicionar</a>
                </div>

                <div class="list-item">
                    <div>
                        <strong>NR-10 Segurança em Eletricidade</strong>
                        <small>SENAI • Concluído em 2025</small>
                    </div>
                    <span class="pill gold">Certificado</span>
                </div>

                <div class="list-item">
                    <div>
                        <strong>NR-35 Trabalho em Altura</strong>
                        <small>SENAI • Concluído em 2025</small>
                    </div>
                    <span class="pill gold">Certificado</span>
                </div>

                <div class="list-item">
                    <div>
                        <strong>Instalações Elétricas Prediais</strong>
                        <small>IFPR • Concluído em 2024</small>
                    </div>
                    <span class="pill">Curso</span>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Últimos serviços</h2>
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
                    <strong>***.456.789-**</strong>
                </div>

                <div class="info-row">
                    <span>Telefone</span>
                    <strong>(41) 99999-9999</strong>
                </div>

                <div class="info-row">
                    <span>E-mail</span>
                    <strong>lucas@email.com</strong>
                </div>

                <div class="info-row">
                    <span>Pix</span>
                    <strong>Cadastrado</strong>
                </div>

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




