<?php

// get user role_id
$role_id = $this->session->userdata('role_id');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<title>Badan Pusat Statistik</title>
	<link rel="icon" href="<?= base_url('assets/'); ?>img/logo.png" type="image/gif" sizes="25x25">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/dist/') ?>css/styles.css" rel="stylesheet" />
	<link href="<?= base_url('assets/dist/') ?>css/fullcalendar.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= base_url('dashboard'); ?>"><img src="<?= base_url('assets/'); ?>img/logo-bps-provinsi-jateng.png" alt="BPS Jateng" style="width: 175px; height: auto;"/></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item btn-logout" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
				<div class="nav">
					<div class="sb-sidenav-menu-heading">Main</div>
					<a class="nav-link" href="<?= base_url('dashboard') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
					</a>

					<?php

					// Menampilkan menu Kegiatan hanya untuk Admin dan Kepala
					if ($role_id == 1 || $role_id == 2) {
						echo '<div class="sb-sidenav-menu-heading">Kegiatan</div>';
						echo '<a class="nav-link" href="' . base_url('kegiatan') . '">';
						echo '<div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>';
						echo 'Kalender</a>';
					}

						// Menampilkan menu Repository
						echo '<div class="sb-sidenav-menu-heading">Repository</div>';
						echo '<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">';
						echo '<div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>';
						echo 'File<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
						echo '</a>';

					// Menampilkan submenu Internal dan Metadata untuk Admin dan Kepala
					if ($role_id == 1 || $role_id == 2) {
						echo '<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">';
						echo '<nav class="sb-sidenav-menu-nested nav">';
						echo '<a class="nav-link" href="' . base_url('internal') . '">Internal</a>';
						echo '<a class="nav-link" href="' . base_url('metadata') . '">Metadata</a>';
						echo '<a class="nav-link" href="' . base_url('eksternal') . '">Eksternal</a>';
						echo '</nav>';
						echo '</div>';
					} else if ($role_id == 3) {
						echo '<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">';
						echo '<nav class="sb-sidenav-menu-nested nav">';
						echo '<a class="nav-link" href="' . base_url('internal') . '">Internal</a>';
						echo '</nav>';
						echo '</div>';
					}

					// Menampilkan menu Profile untuk Admin, Kepala, dan User
					if ($role_id == 1 || $role_id == 2 || $role_id == 3) {
						echo '<div class="sb-sidenav-menu-heading">Others</div>';
						echo '<a class="nav-link" href="' . base_url('profile') . '">';
						echo '<div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>';
						echo 'Profile</a>';
					}

					// Menampilkan menu User hanya untuk Admin
					if ($role_id == 1) {
						echo '<a class="nav-link" href="' . base_url('user') . '">';
						echo '<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>';
						echo 'User</a>';
					}
					?>
					</div>
                </div>
            </nav>
        </div>
