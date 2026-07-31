@extends('layout.app-public')

@section('content')

<div class="saas-profile">
    <!-- Seção de Abertura -->
    <header class="profile-hero">
        <div class="hero-main">
            <span class="status-indicator">Disponível para Projetos</span>
            <h1 class="profile-name">Gabriel Montes</h1>
            <p class="profile-role">Diretor de Produto & Growth Executivo</p>
            <p class="profile-meta">São Paulo, BR • Global Remote</p>
        </div>
        
        <!-- Bloco de Métricas Integrado de Forma Sutil -->
        <div class="metrics-row">
            <div class="metric-item">
                <span class="metric-number">+42%</span>
                <span class="metric-label">LTV Expandido</span>
            </div>
            <div class="metric-item">
                <span class="metric-number">-15%</span>
                <span class="metric-label">Churn Retido</span>
            </div>
        </div>
    </header>

    <hr class="saas-divider">

    <!-- Conteúdo em Colunas Limpas -->
    <div class="profile-content">
        
        <!-- Coluna Principal: Resumo e Histórico -->
        <main class="main-column">
            <section class="profile-section">
                <h2 class="section-title">Resumo Executivo</h2>
                <p class="paragraph">Há mais de uma década desenhando e escalando ecossistemas SaaS B2B. Especialista em estratégias de go-to-market orientadas a PLG, arquitetura de Design Systems corporativos e liderança de times cross-border.</p>
            </section>

            <section class="profile-section">
                <h2 class="section-title">Histórico Recente</h2>
                
                <div class="experience-item core-experience">
                    <div class="exp-header">
                        <h3 class="exp-role">Head de Produto</h3>
                        <span class="exp-date">2023 — Presente</span>
                    </div>
                    <p class="exp-company">Nexos Tech Solutions</p>
                    <p class="paragraph">Liderança direta sobre squads de produto, arquitetando a virada de modelo de negócio para Product-Led Growth.</p>
                </div>

                <div class="experience-item">
                    <div class="exp-header">
                        <h3 class="exp-role">Product Manager Sênior</h3>
                        <span class="exp-date">2020 — 2023</span>
                    </div>
                    <p class="exp-company">Vanguard Digital</p>
                    <p class="paragraph">Responsável pelo core product de automação, atingindo a marca de R$ 2M de ARR no primeiro ano de operação.</p>
                </div>
            </section>
        </main>

        <!-- Coluna Lateral: Skills e CTAs -->
        <aside class="sidebar-column">
            <section class="profile-section">
                <h2 class="section-title">Core Expertise</h2>
                <div class="tag-list">
                    <span class="tag-item">Product Strategy</span>
                    <span class="tag-item">SaaS Metrics</span>
                    <span class="tag-item">UX Architecture</span>
                    <span class="tag-item">Growth</span>
                </div>
            </section>

            <section class="profile-section actions-section">
                <a href="#" class="btn btn-black">Iniciar Conversa</a>
                <a href="#" class="btn btn-outline">Ver LinkedIn ↗</a>
            </section>
        </aside>

    </div>
</div> @endsection