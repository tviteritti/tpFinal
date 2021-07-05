 <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div>
            <span style="color:orange">Encargado</span>
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
                    <a href="<?php echo constant('URL');?>main" class="nav__link">
                        <i class='bx bxs-truck' ></i>
                        <span class="nav__name">vehiculos</span>
                    </a>

                    <a href="<?php echo constant('URL');?>ayuda" class="nav__link">
                        <i class='bx bxs-pin' ></i>
                        <span class="nav__name">Posicion choferes</span>
                    </a>

                    <a href="<?php echo constant('URL');?>pagina2" class="nav__link">
                        <i class='bx bxs-wrench' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>

                    <a href="<?php echo constant('URL');?>consulta" class="nav__link">
                        <i class='bx bx-calendar' ></i>
                        <span class="nav__name">Data</span>
                    </a>

                    <a href="<?php echo constant('URL');?>pagina4" class="nav__link">
                        <i class='bx bx-alarm-exclamation' ></i>
                        <span class="nav__name">Favorites</span>
                    </a>
                </div>
            </div>

            <a href="<?php echo constant('URL');?>encargado/cerrarSesion" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>