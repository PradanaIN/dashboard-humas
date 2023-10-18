<?php 
// apabila user belum login
if ($this->session->userdata('is_login') != 'true') {
	redirect('auth');
} 
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
                    <h6 class="m-0"><i class="fas fa-folder me-1"></i> File Internal</h6>
                    <!-- <button type="button" class="btn btn-primary btn-sm" aria-pressed="false" data-toggle="modal" data-target="#UploadModal">
					<h6 class="m-0"><i class="fas fa-plus me-1"></i> Tambah File</h6>
                    </button> -->
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
        </div>
    </main>
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
                <iframe src="<?= base_url('upload/internal/'.$internal->file_materi) ?>" style="width: 100%; height: 500px;"></iframe>
            </div>
        </div>
    </div>
</div>


