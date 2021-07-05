    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div>
            <span style="color:orange">Administrador</span>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Logo</span>
                </a>

                <div class="nav__list">
                    <a href="<?php echo constant('URL');?>administrador" class="nav__link">
                        <i class='bx bxs-user-badge'></i>
                        <span class="nav__name">CRUD Empleados</span>
                    </a>

                    <a href="<?php echo constant('URL');?>ayuda" class="nav__link">
                        <i class='bx bxs-pin' ></i>
                        <span class="nav__name">Posicion choferes</span>
                    </a>
                </div>
            </div>

            <a href="<?php echo constant('URL');?>administrador/cerrarSesion" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>