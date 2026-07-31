<input type="checkbox" id="menu-toggle" class="menu-toggle">

<label for="menu-toggle" class="menu-button">
    ☰
</label>

<aside class="sidebar">

    <div class="sidebar-logo">
        <div class="sidebar-logo__icon">M</div>
        <h2>MDA</h2>
    </div>

    <nav class="sidebar-nav">

        <a href="#" class="sidebar-nav__item active">
            <span>🏠</span>
            Dashboard
        </a>

        <a href="{{ route('contratante.index') }}" class="sidebar-nav__item">
            <span>👤</span>
            Contratantes
        </a>

        <a href="{{ route('colaborador.index') }}" class="sidebar-nav__item">
            <span>👷</span>
            Colaboradores
        </a>

        <a href="{{ route('profissao.index') }}" class="sidebar-nav__item">
            <span>🤝</span>
            Profissões
        </a>

        <a href="#" class="sidebar-nav__item">
            <span>🛠</span>
            Serviços
        </a>

        <a href="#" class="sidebar-nav__item">
            <span>📁</span>
            Portfólio
        </a>

        <a href="#" class="sidebar-nav__item">
            <span>💰</span>
            Financeiro
        </a>

        <a href="#" class="sidebar-nav__item">
            <span>⚙️</span>
            Configurações
        </a>

    </nav>

    <div class="sidebar-user">
        <div class="sidebar-user__avatar">GJ</div>

        <div>
            <strong>Gilson Junior</strong>
            <small>Administrador</small>
        </div>
    </div>

</aside>