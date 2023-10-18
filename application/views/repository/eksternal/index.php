<?php 
// apabila user belum login
if ($this->session->userdata('is_login') != 'true') {
	redirect('auth');
} 

// get role_id
$role_id = $this->session->userdata('role_id');

?>

<style>
    #datatablesSimple th, td {
        text-align: center;
    }

	#datatablesSimple_wrapper .dataTables_paginate .paginate_button {
		padding: 0;
	}
</style>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
			<?php if ($this->session->flashdata('success')) : ?>
				<?php unset($_SESSION['success']); ?>
			<?php endif; ?>

            <div class="card mb-4 mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0"><i class="fas fa-folder me-1"></i> File Eksternal</h6>
					<?php if ($role_id == 1) : ?>
                    <button type="button" class="btn btn-primary btn-sm" aria-pressed="false" data-toggle="modal" data-target="#UploadModal">
						<h6 class="m-0"><i class="fas fa-plus me-1"></i> Tambah File</h6>
                    </button>
					<?php endif; ?>
                </div>
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
                            foreach ($eksternal as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>

									<?php if ($row->file == "<p>You did not select a file to upload.</p>") : ?>
										<td>File belum diunggah!</td>
									<?php else : ?>
										<!-- if file name too long, cut it -->
										<?php if (strlen($row->file) >= 50) : ?>
											<td><?= substr($row->file, 0, 50) . '...'; ?></td>
										<?php else : ?>
											<td><?= $row->file; ?></td>
										<?php endif; ?>
									<?php endif; ?>
                                    <td><?= $row->kegiatan; ?></td>
                                    <td><?= $row->tema; ?></td>
                                    <td><?= $row->tanggal; ?></td>
                                    <td>
										<div class="d-flex justify-content-around">
										<?php if ($role_id == 1) { ?>
											<a href="<?= base_url('eksternal/edit/'.$row->id) ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="<?= base_url('eksternal/delete/'.$row->id) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fa-solid fa-trash"></i></a>
										<?php } ?>
											<!-- <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-open-preview" data-toggle="modal" data-target="#previewMateri"><i class="fa-solid fa-eye fa-sm"></i></a> -->
											<a href="<?= base_url('eksternal/download/'.$row->id) ?>" class="btn btn-sm btn-success btn-download"><i class="fa-solid fa-download fa-sm"></i></a>
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
</div>
</div>


<!-- modal for upload file -->
<div class="modal fade" id="UploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah File Eksternal</h5>
				<button
					type="button"
					class="close"
					data-dismiss="modal"
					aria-label="Close"
				>
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form action="<?= base_url('eksternal/add') ?>" method="post" enctype="multipart/form-data" id="add">
								<div class="form-group">
									<label for="kegiatan">Kegiatan</label>
									<input class="form-control <?= form_error('kegiatan') ? 'is-invalid' : '' ?>" type="text" id="kegiatan" name="kegiatan" placeholder="Kegiatan" />
									<div class="invalid-feedback">
										<?= form_error('kegiatan') ?>
									</div>
								</div>
								<div class="form-group">
									<label for="tema">Tema</label>
									<input class="form-control <?= form_error('tema') ? 'is-invalid' : '' ?>" type="text" id="tema" name="tema" placeholder="Tema" />
									<div class="invalid-feedback">
										<?= form_error('tema') ?>
									</div>
								</div>
								<div class="form-group">
									<label for="tempat">Tempat</label>
									<input class="form-control <?= form_error('tempat') ? 'is-invalid' : '' ?>" type="text" id="tempat" name="tempat" placeholder="Tempat" />
									<div class="invalid-feedback">
										<?= form_error('tempat') ?>
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal">Tanggal</label>
									<input class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" type="date" id="tanggal" name="tanggal" placeholder="Tanggal" />
									<div class="invalid-feedback">
										<?= form_error('tanggal') ?>
									</div>
								</div>
								<div class="form-group">
									<label for="file">File</label>
									<input class="form-control <?= form_error('file') ? 'is-invalid' : '' ?>" type="file" id="file" name="file" placeholder="File" />
									<div class="invalid-feedback">
										<?= form_error('file') ?>
									</div>
								</div>
						<div class="d-flex align-items-center justify-content-center mt-5 mb-0">
							<button type="submit" class="btn btn-primary btn-user btn-block">Tambah</button>
                    	</div>
					</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal Preview Materi -->
<div class="modal fade" id="previewMateri" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('upload/eksternal/'.$eksternal->file) ?>" style="width: 100%; height: 500px;"></iframe>
            </div>
        </div>
    </div>
</div>
