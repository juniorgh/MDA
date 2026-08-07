@extends('layout.app-public')
@section('content')

<main class="dashboard-colaborador">

    <header class="topo">
        <div>
            <h1>Olá, Lucas 👋</h1>
            <p>Veja o que precisa da sua atenção hoje.</p>
        </div>

        <div class="avatar-mini">
            <img src="https://i.pravatar.cc/100?img=12" alt="">
            <strong>Lucas Ferreira</strong>
        </div>
    </header>

    <section class="painel-acoes">
        <h2>Informações obrigatórias</h2>
        <p> Para plataforma funcionar perfeitamente, é necessário complementar informações</p>


        @foreach($cadastrosFaltantes as $faltantes)
            <div class="acao">
                <div class="icone">📋</div>
                <div>
                    <strong> {{ $faltantes['slug'] }} </strong>
                    <small> {{ $faltantes['mensagem'] }}</small>
                </div>
                <a href="{{ route($faltantes['classe']) }}" class="btn gold"> Add {{ $faltantes['slug'] }} </a>
            </div>
        @endforeach
    </section>

    <section class="painel-acoes">
        <h2>Central de ações</h2>
        <p>Prioridades rápidas para manter seu perfil ativo e competitivo.</p>


        <div class="acao">
            <div class="icone">👤</div>
            <div>
                <strong>Seu perfil está 82% completo</strong>
                <small>Adicione descrição e mais qualificações.</small>
            </div>
            {{-- <a href="{{ route('colaborador.show',['colaborador' => $colaborador->id ]) }}" class="btn outline">Completar perfil</a> --}}
        </div>

        <div class="acao">
            <div class="icone">⚠️</div>
            <div>
                <strong>Certificado NR-10 vence em 20 dias</strong>
                <small>Atualize o documento para manter a conta regular.</small>
            </div>
            <a href="#" class="btn outline">Atualizar</a>
        </div>
    </section>

    <section class="metricas">
        <div class="card">
            <span>Serviços ativos</span>
            <strong>3</strong>
            <small>2 em andamento</small>
        </div>

        <div class="card">
            <span>Avaliação média</span>
            <strong>4.9</strong>
            <small>127 avaliações</small>
        </div>

        <div class="card">
            <span>Visitas no perfil</span>
            <strong>234</strong>
            <small>últimos 30 dias</small>
        </div>

        <div class="card">
            <span>Qualificações</span>
            <strong>12</strong>
            <small>8 com certificado</small>
        </div>
    </section>

    <section class="grid">

        <div>
            <div class="box">
                <div class="box-header">
                    <h3>Serviços recentes</h3>
                    <a href="#">Ver todos</a>
                </div>

                <div class="servico">
                    <div>
                        <strong>Instalação elétrica residencial</strong>
                        <small>Cliente: João Martins • Hoje às 10:30</small>
                    </div>
                    <span class="status andamento">Em andamento</span>
                </div>

                <div class="servico">
                    <div>
                        <strong>Troca de disjuntores</strong>
                        <small>Cliente: Ana Paula • Ontem</small>
                    </div>
                    <span class="status finalizado">Finalizado</span>
                </div>

                <div class="servico">
                    <div>
                        <strong>Orçamento para energia solar</strong>
                        <small>Cliente: Carlos Lima • 18/06/2026</small>
                    </div>
                    <span class="status andamento">Aguardando</span>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h3>Últimas avaliações</h3>
                    <a href="#">Ver avaliações</a>
                </div>

                <div class="avaliacao">
                    <strong>★★★★★</strong>
                    <p>Excelente profissional. Pontual, educado e caprichoso.</p>
                    <small>Maria Souza</small>
                </div>

                <div class="avaliacao">
                    <strong>★★★★★</strong>
                    <p>Resolveu o problema rapidamente e explicou tudo com clareza.</p>
                    <small>Roberto Almeida</small>
                </div>
            </div>
        </div>

        <aside>
            <div class="box perfil-card">
                <div class="box-header">
                    <h3>Meu perfil</h3>
                </div>

                <div class="progresso">
                    <div>82%</div>
                </div>

                <ul class="lista-check">
                    <li class="ok">✓ Foto adicionada</li>
                    <li class="ok">✓ Profissão cadastrada</li>
                    <li class="erro">✕ Falta descrição profissional</li>
                    <li class="erro">✕ Adicione mais 2 qualificações</li>
                </ul>

                <a href="#" class="btn gold">Editar perfil</a>
            </div>

            <div class="box">
                <div class="box-header">
                    <h3>Configuração rápida</h3>
                </div>

                <div class="servico">
                    <div>
                        <strong>Telefone</strong>
                        <small>(41) 99999-9999</small>
                    </div>
                </div>

                <div class="servico">
                    <div>
                        <strong>Pix</strong>
                        <small>Cadastrado</small>
                    </div>
                </div>

                <div class="servico">
                    <div>
                        <strong>Disponibilidade</strong>
                        <small>Segunda a sábado</small>
                    </div>
                </div>
            </div>
        </aside>

    </section>

    <section class="banner">
        <div class="banner-icon">🏆</div>
        <div>
            <h3>Você está entre os 15% melhores eletricistas da sua região.</h3>
            <p>Completar seu perfil pode aumentar sua posição nas buscas.</p>
        </div>
    </section>

</main>
@endsection