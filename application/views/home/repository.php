<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?= base_url('assets/'); ?>img/logo.png" type="image/gif" sizes="25x25">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>BPS Provinsi Jawa Tengah</title>

		<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
		
    <link rel="stylesheet" href="<?= base_url('assets/assets/') ?>css/maicons.css" />
    <link rel="stylesheet" href="<?= base_url('assets/assets/') ?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url('assets/assets/') ?>vendor/animate/animate.css" />
    <link rel="stylesheet" href="<?= base_url('assets/assets/') ?>css/theme.css" />
		<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
				<div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>File</th>
                                <th>Kegiatan</th>
                                <th>Tema</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>File</th>
                                <th>Kegiatan</th>
                                <th>Tema</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1;
                            foreach ($internal as $row) : ?>
							<?php if (!empty($row->file_materi)) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
									<!-- if file name too long, cut it -->
									<?php if (strlen($row->file_materi) >= 50) : ?>
										<td><?= substr($row->file_materi, 0, 50).'...'; ?></td>
									<?php else : ?>
										<td><?= $row->file_materi; ?></td>
									<?php endif; ?>
                                    <td><?= $row->kegiatan; ?></td>
                                    <td><?= $row->tema; ?></td>
                                    <td><?= date('j F Y', strtotime($row->waktu_mulai)); ?></td>
                                    <td class="d-flex flex-row align-items-center justify-between">
										<!-- <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-open-preview mr-2" data-toggle="modal" data-target="#previewMateri"><i class="fa-solid fa-eye fa-sm"></i></a> -->
										<a href="<?= base_url('kegiatan/download/'.$row->id.'/'.$row->file_materi) ?>" class="btn btn-sm btn-success btn-download ml-2"><i class="fa-solid fa-download fa-sm"></i></a>
									</td>
                                <?php $no++;
								endif; ?>
                            <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
      </div>
    </header>

    <style>
    #datatablesSimple th, td {
        text-align: center;
    }

	#datatablesSimple_wrapper .dataTables_paginate .paginate_button {
		padding: 0;
	}
  </style>

    <script src="<?= base_url('assets/assets/') ?>js/jquery-3.5.1.min.js"></script>

    <script src="<?= base_url('assets/assets/') ?>js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets/assets/') ?>js/google-maps.js"></script>

    <script src="<?= base_url('assets/assets/') ?>vendor/wow/wow.min.js"></script>

    <script src="<?= base_url('assets/assets/') ?>js/theme.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
		<script src="<?= base_url('assets/dist/') ?>js/datatables-simple-demo.js"></script>
  </body>
</html>
