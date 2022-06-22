<body class="h-100">
    <div class="loading overlay">
        <div class="lds-dual-ring"></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= base_url() ?>assets/images/shards-dashboards-logo-warning.svg" alt="Shards Dashboard">
                                <span class="d-none d-md-inline ml-1">Shards Dashboard</span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                    <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
                    </div>
                </form>
                <div class="nav-wrapper">
                    <ul class="nav nav--no-borders flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= activate_menu('dashboard') ?>" href="<?= base_url('dashboard') ?>">
                                <i class="fa-solid fa-pencil"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activate_menu('author') ?>" href="<?= base_url('author') ?>">
                                <i class="fa-solid fa-lock"></i>
                                <span>Unverifed Author</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activate_menu('permohonan') ?>" href="<?= base_url('permohonan/detail') ?>">
                                <i class="fa-solid fa-handshake"></i>
                                <span>Permohonan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activate_menu('allauthor') ?>" href="<?= base_url('all-author') ?>">
                                <i class="fa-solid fa-users"></i>
                                <span>All Authors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="blog-overview.html">
                                <i class="fa-solid fa-users"></i>
                                <span>My Affiliations</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->