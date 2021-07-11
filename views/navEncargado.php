 <header class="header body-pd" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div>
            <span style="color:orange">Encargado</span>
        </div>
    </header>
 
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Logo</span>
                </a>

                <div class="nav__list">
                    <a href="<?php echo constant('URL');?>encargado" class="nav__link">
                        <i class='bx bxs-truck' ></i>
                        <span class="nav__name">vehiculos</span>
                    </a>

                    <a href="<?php echo constant('URL');?>encargado/verPosicion" class="nav__link">
                        <i class='bx bxs-pin' ></i>
                        <span class="nav__name">Posicion choferes</span>
                    </a>

                    <a href="<?php echo constant('URL');?>encargado/realizarService" class="nav__link">
                        <i class='bx bxs-wrench' ></i>
                        <span class="nav__name">Mantenimiento</span>
                    </a>

                    <a href="<?php echo constant('URL');?>encargado/verCalendario" class="nav__link">
                        <i class='bx bx-calendar' ></i>
                        <span class="nav__name">Calendario</span>
                    </a>
                </div>
            </div>

            <a href="<?php echo constant('URL');?>encargado/cerrarSesion" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>