    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__img">
            <img src="views/img/perfil.jpg" alt="">
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
                        <i class='bx  bx-home  nav__icon'></i>
                        <span class="nav__name">Messages</span>
                    </a>

                    <a href="<?php echo constant('URL');?>ayuda" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Users</span>
                    </a>

                    <a href="<?php echo constant('URL');?>pagina2" class="nav__link">
                        <i class='bx bx-message-add nav__icon'></i>
                        <span class="nav__name">Dashboard</span>
                    </a>

                    <a href="<?php echo constant('URL');?>pagina3" class="nav__link">
                        <i class='bx bx-medal nav__icon'></i>
                        <span class="nav__name">Data</span>
                    </a>

                    <a href="<?php echo constant('URL');?>pagina4" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Favorites</span>
                    </a>
                </div>
            </div>

            <a href="#" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>