<div id="layoutSidenav_content">
                <main>

                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-3">
							<div class="card-header d-flex justify-content-between align-items-center">
								<h6 class="m-0"><i class="fas fa-user me-1"></i> Edit User</h6>
							</div>

							<div class="card-body">
								<form action="" method="post" enctype="multipart/form-data" >
									<div class="row">
										<div class="col">
											<input class="form-control" type="hidden" id="id" name="id" value="<?= $user->id ?>"/>
											<input class="form-control" type="hidden" id="old_password" name="old_password" value="<?= $user->password ?>"/>

											<div class="form-group">
												<label for="nama" class="col-form-label">Nama</label>
												<input type="text" class="form-control" id="nama" name="nama" required value="<?= $user->nama ?>"/>
											</div>
											<div class="form-group">
												<label for="email" class="col-form-label">Email</label>
												<input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" required value="<?= $user->email ?>"/>
												<div class="invalid-feedback">
													<?= form_error('email') ?>
												</div>
											</div>
											<div class="form-group">
												<label for="role" class="col-form-label">Role</label>
												<select class="form-control" id="role" name="role" required>
													<option value="">-- Pilih Role --</option>
													<?php if ($user->role_id == 1) : ?>
														<option value="1" selected>Admin</option>
														<option value="2">Kepala</option>
														<option value="3">User</option>
													<?php elseif ($user->role_id == 2) : ?>
														<option value="1">Admin</option>
														<option value="2" selected>Kepala</option>
														<option value="3">User</option>
													<?php elseif ($user->role_id == 3) : ?>
														<option value="1">Admin</option>
														<option value="2">Kepala</option>
														<option value="3" selected>User</option>
													<?php endif; ?>
												</select>
											</div>
											<div class="form-group">
												<label for="password" class="col-form-label">Password</label>
												<div class="input-group">
													<input type="password" class="form-control" id="password" name="password"/>
														<div class="input-group-append">
															<span class="input-group-text">
																<i id="togglePassword" class="fa fa-eye-slash" onclick="togglePassword()"></i>
															</span>
														</div>
												</div>
											</div>
										</div>
									</div>
									<button class="btn btn-primary mt-3 btn-block" type="submit" name="btn">Edit User</button>
								</form>	
                        </div>
                    </div>
                </main>
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
