@extends('layout.app-public')
@section('content')

<section class="admin-colaboradores">

    <div class="page-header">
        <div>
            <span class="page-label">Administração</span>
            <h1>Colaboradores</h1>
            <p>Visão geral dos profissionais cadastrados na plataforma.</p>
        </div>

        <a href="#" class="btn-primary">+ Novo Colaborador</a>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <span>Total</span>
            <strong>248</strong>
            <small>colaboradores cadastrados</small>
        </div>

        <div class="stat-card">
            <span>Ativos</span>
            <strong>221</strong>
            <small>disponíveis na plataforma</small>
        </div>

        <div class="stat-card warning">
            <span>Pendentes</span>
            <strong>18</strong>
            <small>precisam de análise</small>
        </div>

        <div class="stat-card">
            <span>Média geral</span>
            <strong>4.87</strong>
            <small>avaliação dos profissionais</small>
        </div>
    </div>

    <div class="filter-box">
        <div class="search">
            <span>🔎</span>
            <input type="text" placeholder="Pesquisar por nome, cidade ou profissão">
        </div>

        <select>
            <option>Profissão</option>
            <option>Eletricista</option>
            <option>Pedreiro</option>
            <option>Pintor</option>
        </select>

        <select>
            <option>Status</option>
            <option>Ativo</option>
            <option>Pendente</option>
            <option>Bloqueado</option>
        </select>

        <select>
            <option>Ordenar</option>
            <option>Melhor avaliação</option>
            <option>Mais serviços</option>
            <option>Mais recente</option>
        </select>
    </div>

    <div class="colaboradores-list">

        <article class="colaborador-card">
            <div class="colaborador-main">
                <div class="avatar">JS</div>

                <div>
                    <div class="name-line">
                        <h3>João Silva</h3>
                        <span class="badge active">Ativo</span>
                    </div>

                    <p>Eletricista Residencial</p>

                    <div class="meta">
                        <span>Curitiba</span>
                        <span>⭐ 4.9</span>
                        <span>184 serviços</span>
                        <span>12 qualificações</span>
                    </div>
                </div>
            </div>

            <div class="admin-status">
                <span class="verified">Conta verificada</span>
                <small>Último acesso: hoje às 09:42</small>
            </div>

            <div class="actions">
                <a href="#" class="btn-profile">Ver Perfil</a>
            </div>
        </article>

        <article class="colaborador-card">
            <div class="colaborador-main">
                <div class="avatar">CS</div>

                <div>
                    <div class="name-line">
                        <h3>Carlos Souza</h3>
                        <span class="badge pending">Pendente</span>
                    </div>

                    <p>Pedreiro</p>

                    <div class="meta">
                        <span>Araucária</span>
                        <span>⭐ 4.4</span>
                        <span>58 serviços</span>
                        <span>4 qualificações</span>
                    </div>
                </div>
            </div>

            <div class="admin-status">
                <span class="alert">Documento pendente</span>
                <small>Último acesso: ontem</small>
            </div>

            <div class="actions">
                <a href="#" class="btn-profile">Ver Perfil</a>
            </div>
        </article>

        <article class="colaborador-card">
            <div class="colaborador-main">
                <div class="avatar">MO</div>

                <div>
                    <div class="name-line">
                        <h3>Maria Oliveira</h3>
                        <span class="badge active">Ativo</span>
                    </div>

                    <p>Pintora Residencial</p>

                    <div class="meta">
                        <span>São José dos Pinhais</span>
                        <span>⭐ 5.0</span>
                        <span>32 serviços</span>
                        <span>8 qualificações</span>
                    </div>
                </div>
            </div>

            <div class="admin-status">
                <span class="verified">Conta verificada</span>
                <small>Último acesso: há 2 horas</small>
            </div>

            <div class="actions">
                <a href="#" class="btn-profile">Ver Perfil</a>
            </div>
        </article>

    </div>

</section>

@endsection