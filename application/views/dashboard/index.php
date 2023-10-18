<?php 

// apabila user belum login
if ($this->session->userdata('is_login') != 'true') {
	redirect('auth');
} 

?>
			
			
			
			<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="sb-card-body">
                            <h1 class="mt-3" style="color: #73a1b2">Sugeng Rawuh, <?= $name ?>!</h1>
                            <ol class="breadcrumb mb-3 mt-3">
                                <li class="breadcrumb-item active" style="color: black;">Dashboard</li>
                            </ol>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?= $total_kegiatan ?> Kegiatan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= base_url('kegiatan') ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><?= $total_internal ?> File Internal</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= base_url('internal') ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><?= $total_eksternal ?> File Eksternal</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= base_url('eksternal') ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><?= $total_metadata ?> File Metadata</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= base_url('metadata') ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            </div>
