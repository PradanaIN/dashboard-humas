<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?= base_url('assets/'); ?>img/logo.png" type="image/gif" sizes="25x25">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>BPS Provinsi Jawa Tengah</title>

    <link rel="stylesheet" href="<?= base_url('assets/assets/') ?>css/maicons.css" />

    <link rel="stylesheet" href="<?= base_url('assets/assets/') ?>css/bootstrap.css" />

    <link rel="stylesheet" href="<?= base_url('assets/assets/') ?>vendor/animate/animate.css" />

    <link rel="stylesheet" href="<?= base_url('assets/assets/') ?>css/theme.css" />
  </head>
  <body>
    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
      <nav
        class="navbar navbar-expand-lg navbar-light bg-white sticky"
        data-offset="500"
      >
        <div class="container">
				<a class="navbar-brand ps-3" href="<?= base_url('home/index'); ?>"><img src="<?= base_url('assets/'); ?>img/logo-bps-provinsi-jateng.png" alt="BPS Jateng" style="width: 175px; height: auto;"/></a>

          <button
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarContent"
            aria-controls="navbarContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-collapse collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/index') ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/repository') ?>">Repository</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-primary ml-lg-2" href="<?= base_url('auth') ?>">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="page-banner home-banner">
          <div class="row align-items-center flex-wrap-reverse h-100">
            <div class="col-md-6 py-5 wow fadeInLeft">
              <h1 class="mb-4">Selamat Datang di Repository BPS Provinsi Jawa Tengah!</h1>
              <p class="text-lg text-grey mb-5">
								Di sini Anda akan menemukan beragam file materi yang dapat Anda unduh! 
              </p>
              <a href="<?= base_url('home/repository') ?>" class="btn btn-primary btn-split"
                >File Materi
                <div class="fab"><span class="mai-play"></span></div
              ></a>
            </div>
            <div class="col-md-6 py-5 wow zoomIn">
              <div class="img-fluid text-center">
                <img src="<?= base_url('assets/assets/') ?>img/files.png" width="100%" height="100%" alt=""/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <script src="<?= base_url('assets/assets/') ?>js/jquery-3.5.1.min.js"></script>

    <script src="<?= base_url('assets/assets/') ?>js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets/assets/') ?>js/google-maps.js"></script>

    <script src="<?= base_url('assets/assets/') ?>vendor/wow/wow.min.js"></script>

    <script src="<?= base_url('assets/assets/') ?>js/theme.js"></script>
  </body>
</html>
