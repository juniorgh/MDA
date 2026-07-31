@extends('layout.app-public')
@section('content')
    <section class="colaborador">

    <header class="colaborador__header">
        <div class="colaborador__titulo">
            <h1>Contratantes</h1>
            <p>
                Gerencie os contratantes cadastrados na plataforma.
            </p>
        </div>
        <div class="colaborador__acoes">
            <div class="colaborador__busca">
                <span>🔍</span>
                <input type="text" placeholder="Pesquisar Contratante...">
            </div>

            <button class="btn btn--secondary">
                Filtros
            </button>

            <a href="{{ route('contratante.create') }}" class="btn btn--primary">
                + Novo Contratante
            </a>
        </div>
    </header>

    <section class="colaborador__lista">


        <article class="colaborador-card">
            <div class="colaborador-card__avatar"> 
            </div>

            <div class="colaborador-card__perfil">
                <h3>
                </h3>
                <span>
                </span>
                <div class="colaborador-card__badges">
                    <span class="badge badge--success">
                        Ativo
                    </span>
                    <span class="badge">
                        Contratante
                    </span>
                </div>
            </div>

            <div class="colaborador-card__dado">
                <label>CPF</label>
                <strong>
                </strong>
            </div>

            <div class="colaborador-card__dado">
                <label>Telefone</label>

                <strong>
                </strong>
            </div>

            <div class="colaborador-card__dado">
                <label>PIX</label>

                <strong>
                </strong>

            </div>

            <div class="colaborador-card__acoes">
                <a href="#"> 👁 </a>

                <a href="" > ✏ </a>

                <form action="" method="POST" >
                    @csrf

                    <button type="submit"> 🗑 </button>
                </form>
            </div>
        </article>

    </section>

</section>
@endsection