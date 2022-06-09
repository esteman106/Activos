<!DOCTYPE html>
    <html lang="<?php echo LNG_CONTENT ?>">

    <head>

        <meta charset="<?php echo FORMAT_CONTENT ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Activos - <?php echo $this->Title = $this->Title ?? "Error";?></title>
        <!-- Fontfaces CSS-->
        <link href="<?php echo PUBLIC_HTML ?>css/font-face.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="<?php echo ASSETS ?>bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="<?php echo ASSETS ?>animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>wow/animate.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>slick/slick.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>select2/select2.min.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <link href="<?php echo ASSETS ?>vector-map/jqvmap.min.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="<?php echo PUBLIC_HTML ?>css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo PUBLIC_HTML ?>img/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?php echo PUBLIC_HTML ?>img/default_avatar.png" alt="<?php echo $this->nameUsr = $this->nameUsr ?? ""; ?>" />
                    </div>
                    <h4 class="name"><?php echo $this->nameUsr = $this->nameUsr ?? ""; ?></h4>
                    <a href="<?php echo BASE_URL ?>logout">Logout</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?php echo BASE_URL ?>">
                                <i class="fas fa-home"></i>Inicio
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL ?>activos">
                                <i class="fas fa-desktop"></i>Activos
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL ?>prestamos">
                                <i class="fas fa-shopping-basket"></i>Prestamos</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL ?>usuarios">
                                <i class="fas fa-solid fa-users"></i>Usuarios</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL ?>logout">
                                <i class="zmdi zmdi-power"></i>Salir</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="<?php echo PUBLIC_HTML ?>img/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>

                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Perfil</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Configuraciones</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="<?php echo PUBLIC_HTML ?>img/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="<?php echo PUBLIC_HTML ?>img/perfil_default.jpg" alt="<?php echo $this->nameUsr = $this->nameUsr ?? ""; ?>" />
                        </div>
                        <h4 class="name">john doe</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="<?php echo BASE_URL ?>">
                                    <i class="fas fa-chart-bar"></i>Home</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>activos">
                                    <i class="fas fa-shopping-basket"></i>Activos</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>prestamos">
                                    <i class="fas fa-shopping-basket"></i>Prestamos</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>usuarios">
                                    <i class="fas fa-solid fa-users"></i>Usuarios</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>logout">
                                    <i class="fas fa-shopping-basket"></i>Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">Usted está en:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="<?php echo BASE_URL ?>">Inicio</a>
                                            </li>
                                            <?php if(isset($this->Location)){
                                                echo ' <li class="list-inline-item seprate">
                                                <span>/</span></li><li class="list-inline-item">'. $this->Location. '</li>';
                                            }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
            <?php echo $this->AddBody = $this->AddBody ?? "";?>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2021 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <!-- Jquery JS-->
    <script src="<?php echo ASSETS ?>jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo ASSETS ?>bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo ASSETS ?>bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo ASSETS ?>slick/slick.min.js">
    </script>
    <script src="<?php echo ASSETS ?>wow/wow.min.js"></script>
    <script src="<?php echo ASSETS ?>animsition/animsition.min.js"></script>
    <script src="<?php echo ASSETS ?>bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo ASSETS ?>counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo ASSETS ?>counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo ASSETS ?>circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo ASSETS ?>perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo ASSETS ?>chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo ASSETS ?>select2/select2.min.js">
    </script>
    <script src="<?php echo ASSETS ?>vector-map/jquery.vmap.js"></script>
    <script src="<?php echo ASSETS ?>vector-map/jquery.vmap.min.js"></script>
    <script src="<?php echo ASSETS ?>vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo ASSETS ?>vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="<?php echo PUBLIC_HTML ?>js/main.js"></script>
    <script src="<?php echo PUBLIC_HTML ?>js/bootstrap-table.js"></script>
    <script src="<?php echo PUBLIC_HTML ?>js/bootstrap-table-export.js"></script>
    <script src="<?php echo PUBLIC_HTML ?>js/tableExport.js"></script>



    </body>

    </html>