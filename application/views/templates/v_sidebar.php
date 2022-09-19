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
								<span class="d-none d-md-inline ml-1">HAKI UNIKU</span>
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
						<?php if ($this->session->userdata('role') == 'admin') { ?>
							<li class="nav-item">
								<a class="nav-link <?= activate_menu('dashboard') ?>" href="<?= base_url('dashboard') ?>">
									<i class="fa-solid fa-pencil"></i>
									<span>Dashboard</span>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link <?= activate_menu('permohonan') ?>" href="<?= base_url('permohonan') ?>">
								<i class="fa-solid fa-handshake"></i>
								<span>Permohonan Baru</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= activate_menu('daftarpermohonan') ?>" href="<?= base_url('daftarpermohonan') ?>">
								<i class="fa-solid fa-clock"></i>
								<span>Daftar Permohonan</span>
							</a>
						</li>
						<?php if ($this->session->userdata('role') == 'admin') { ?>
							<li class="nav-item dropdown <?= activate_submenu('provinsi'), activate_submenu('negara'),  activate_submenu('kota'),  activate_submenu('JenisPermohonan'), activate_submenu('jenis'), activate_submenu('fakultas'), activate_submenu('pemegang') ?> ?>">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
									<i class="material-icons">&#xE2C7;</i>
									<span>Data Master</span>
								</a>
								<div class="dropdown-menu dropdown-menu-small <?= activate_submenu('provinsi'), activate_submenu('negara'),  activate_submenu('kota'),  activate_submenu('JenisPermohonan'), activate_submenu('jenis'), activate_submenu('fakultas'), activate_submenu('pemegang') ?> ?>">
									<a class="dropdown-item <?= activate_menu('JenisPermohonan') ?>" href="<?= base_url('jenis-permohonan') ?>">Jenis Permohonan</a>
									<a class="dropdown-item <?= activate_menu('jenis') ?>" href="<?= base_url('jenis') ?>">Jenis Ciptaan</a>
									<a class="dropdown-item <?= activate_menu('fakultas') ?>" href="<?= base_url('fakultas') ?>">Fakultas</a>
									<a class="dropdown-item <?= activate_menu('negara') ?>" href="<?= base_url('negara') ?>">Negara</a>
									<a class="dropdown-item <?= activate_menu('provinsi') ?>" href="<?= base_url('provinsi') ?>">Provinsi</a>
									<a class="dropdown-item <?= activate_menu('kota') ?>" href="<?= base_url('kota') ?>">Kota</a>
									<a class="dropdown-item <?= activate_menu('pemegang') ?>" href="<?= base_url('pemegang') ?>">Pemegang HKI</a>
								</div>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link <?= activate_menu('dosen') ?>" href="<?= base_url('dosen') ?>">
								<i class="fa-solid fa-user"></i>
								<span>Dosen</span>
							</a>
						</li>
						<?php if ($this->session->userdata('role') == 'admin') { ?>
							<li class="nav-item">
								<a class="nav-link <?= activate_menu('administrator') ?>" href="<?= base_url('administrator') ?>">
									<i class="fa-solid fa-users"></i>
									<span>Administrator</span>
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link  <?= activate_menu('GantiPassword') ?>" href="<?= base_url('ganti-password') ?>">
								<i class="fa-solid fa-unlock"></i>
								<span>Ganti Password</span>
							</a>
						</li>
					</ul>
				</div>
			</aside>
			<!-- End Main Sidebar -->
