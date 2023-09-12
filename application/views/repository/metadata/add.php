<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    
                        <ol class="breadcrumb mb-3 mt-3">
                            <li class="breadcrumb-item">Repository</li>
                            <li class="breadcrumb-item">Metadata</li>
							<li class="breadcrumb-item active">Add</li>
                        </ol>
                        <div class="card mb-4">
							<div class="card-header d-flex justify-content-between align-items-center">
								<h6 class="m-0"><i class="fas fa-table me-1"></i> Repository Metadata</h6>
							</div>

							<div class="card-body">
								<form action="<?= base_url('metadata/add') ?>" method="post" enctype="multipart/form-data" >
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="kegiatan">Kegiatan</label>
												<input class="form-control <?= form_error('kegiatan') ? 'is-invalid':'' ?>" type="text" id="kegiatan" name="kegiatan" placeholder="Kegiatan" />
												<div class="invalid-feedback">
													<?= form_error('kegiatan') ?>
												</div>
											</div>
											<div class="form-group">
												<label for="tempat">Tempat</label>
												<input class="form-control <?= form_error('tempat') ? 'is-invalid':'' ?>" type="text" id="tempat" name="tempat" placeholder="Tempat" />
												<div class="invalid-feedback">
													<?= form_error('tempat') ?>
												</div>
											</div>
											<div class="form-group">
												<label for="tanggal">Tanggal</label>
												<input class="form-control <?= form_error('tanggal') ? 'is-invalid':'' ?>" type="date" id="tanggal" name="tanggal" placeholder="Tanggal" />
												<div class="invalid-feedback">
													<?= form_error('tanggal') ?>
												</div>
											</div>
											<div class="form-group">
												<label for="file">File</label>
												<input class="form-control <?= form_error('file') ? 'is-invalid':'' ?>" type="file" id="file" name="file" placeholder="File" />
												<div class="invalid-feedback">
													<?= form_error('file') ?>
												</div>
											</div>
										</div>
									</div>
									<button class="btn btn-success" type="submit" name="btn">
											Upload
									</button>
								</form>	
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
