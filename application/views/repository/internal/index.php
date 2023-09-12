<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
			<?php if ($this->session->flashdata('success')) : ?>
				<?php unset($_SESSION['success']); ?>
			<?php endif; ?>


            <ol class="breadcrumb mb-3 mt-3">
                <li class="breadcrumb-item">Repository</li>
                <li class="breadcrumb-item active">Internal</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0"><i class="fas fa-table me-1"></i> Repository Internal</h6>
                    <button type="button" class="btn btn-primary btn-sm" aria-pressed="false" data-toggle="modal" data-target="#UploadModal">
                        <a href="<?= base_url("internal/add") ?>" style="text-decoration: none; color: white;">
                            Upload File
                        </a>
                    </button>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>File</th>
                                <th>Kegiatan</th>
                                <th>Tempat</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>File</th>
                                <th>Kegiatan</th>
                                <th>Tempat</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1;
                            foreach ($internal as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->file; ?></td>
                                    <td><?= $row->kegiatan; ?></td>
                                    <td><?= $row->tempat; ?></td>
                                    <td><?= $row->tanggal; ?></td>
                                    <td>
										<div class="d-flex justify-content-around">
											<a href="<?= base_url('internal/edit/'.$row->id) ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="<?= base_url('internal/delete/'.$row->id) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fa-solid fa-trash"></i></a>
											<a href="<?= base_url('internal/download/'.$row->id) ?>" class="btn btn-sm btn-success btn-download"><i class="fa-solid fa-file-arrow-down"></i></a>
										</div>
									</td>
                                <?php $no++;
                            endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
