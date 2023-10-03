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


            <div class="card mb-4 mt-3">
				<div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0"><i class="fas fa-list me-1"></i> Daftar User</h6>
                    <button type="button" class="btn btn-primary btn-sm" aria-pressed="false" data-toggle="modal" data-target="#UploadModal">
					<h6 class="m-0"><i class="fas fa-plus me-1"></i> Tambah User</h6>
                    </button>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Date Created</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Date Created</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->email; ?></td>
									<td><?= $row->role_id == 1 ? 'Admin' : ($row->role_id == 2 ? 'Kepala' : 'User'); ?></td>
                                    <td><?= $row->date_created; ?></td>
                                    <td>
										<div class="d-flex justify-content-around">
											<a href="<?= base_url('user/edit/'.$row->id) ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="<?= base_url('user/delete/'.$row->id) ?>" class="btn btn-sm btn-danger btn-delete"><i class="fa-solid fa-trash"></i></a>
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


<!-- modal for register/add user -->
<div class="modal fade" id="UploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
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
				<form method="post" enctype="multipart/form-data" id="add" action="<?= base_url('user/add') ?>">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="nama" class="col-form-label">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" required/>
							</div>
							<div class="form-group">
								<label for="email" class="col-form-label">Email</label>
								<input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" required/>
								<div class="invalid-feedback">
									<?= form_error('email') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="role" class="col-form-label">Role</label>
								<select class="form-control" id="role" name="role" required>
									<option value="">-- Pilih Role --</option>
									<option value="1">Admin</option>
									<option value="2">Kepala</option>
									<option value="3">User</option>
								</select>
							</div>
							<div class="form-group">
								<label for="password" class="col-form-label">Password</label>
								<div class="input-group">
									<input type="password" class="form-control" id="password" name="password" required/>
										<div class="input-group-append">
											<span class="input-group-text">
												<i id="togglePassword" class="fa fa-eye-slash" onclick="togglePassword()"></i>
											</span>
										</div>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-center mt-3 mb-0">
								<button type="submit" class="btn btn-primary btn-user btn-block">Tambah</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>




<script>
function togglePassword() {
    var passwordField = document.getElementById("password");
    var toggleIcon = document.getElementById("togglePassword");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.className = "fa fa-eye";
    } else {
        passwordField.type = "password";
        toggleIcon.className = "fa fa-eye-slash";
    }
}
</script>
