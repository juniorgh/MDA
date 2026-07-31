@extends('layout.app-public')
@section('content')
<section class="mda-admin-page">
    <header class="mda-page-header">
        <div>
            <span class="mda-kicker">Administração</span>
            <h1>Colaboradores</h1>
            <p>Acompanhe profissionais, pendências, desempenho e situação cadastral.</p>
        </div>

        <a href="{{ route('colaborador.create') }}" class="mda-btn-primary">+ Novo Colaborador</a>
    </header>

    <section class="mda-overview">
        <div class="mda-stat">
            <span>Total</span>
            <strong>248</strong>
            <small>Cadastrados</small>
        </div>

        <div class="mda-stat">
            <span>Ativos</span>
            <strong>221</strong>
            <small>Disponíveis</small>
        </div>

        <div class="mda-stat mda-alert-stat">
            <span>Pendentes</span>
            <strong>18</strong>
            <small>Exigem revisão</small>
        </div>

        <div class="mda-stat">
            <span>Média</span>
            <strong>4.87</strong>
            <small>Avaliação geral</small>
        </div>
    </section>

    <section class="mda-panel">
        <div class="mda-toolbar">
            <div class="mda-search">
                <span>⌕</span>
                <input type="text" placeholder="Buscar colaborador, cidade ou profissão">
            </div>

            <select>
                <option>Status</option>
                <option>Ativo</option>
                <option>Pendente</option>
                <option>Bloqueado</option>
            </select>

            <select>
                <option>Profissão</option>
                <option>Eletricista</option>
                <option>Pedreiro</option>
                <option>Pintor</option>
            </select>

            <select>
                <option>Ordenar</option>
                <option>Melhor avaliação</option>
                <option>Mais serviços</option>
                <option>Mais recente</option>
            </select>
        </div>

        <div class="mda-list">
            @foreach($colaboradores as $colaborador)
                <article class="mda-card">
                    <div class="mda-user">
                        <div class="mda-avatar">JS</div>

                        <div>
                            <div class="mda-name">
                                <h3> {{ $colaborador->user->name . ' ' . $colaborador->user->sobrenome }}</h3>
                                <span class="mda-badge mda-active">Ativo</span>
                            </div>

                            <p>Eletricista Residencial</p>

                            <div class="mda-tags">
                                <span>Curitiba</span>
                                <span>⭐ 4.9</span>
                                <span>184 serviços</span>
                                <span>12 qualificações</span>
                            </div>
                        </div>
                    </div>

                    <div class="mda-check">
                        <strong>Conta verificada</strong>
                        <small>Último acesso hoje às 09:42</small>
                    </div>

                    <a href="{{ route('colaborador.show', ['colaborador' => $colaborador->id ] ) }}" class="mda-btn-profile">Ver Perfil</a>
                </article>
            @endforeach
        </div>

    </section>
</section>

@endsection




