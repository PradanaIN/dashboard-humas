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
                        <!-- <div class="row">
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Repository File
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
                                                    <th>Tanggal</th>
                                                    <th>Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="" class="btn btn-sm btn-danger">Hapus</a>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Reminder!
                                    </div>
                                    <div class="card-body">
                 
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Rapat ST</div>
                                                    Kota Semarang
                                                </div>
                                                <span class="badge bg-primary rounded-pill">14-Aug-2023</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Pembinaan Ubinan</div>
                                                    Kab. Banjarnegara
                                                </div>
                                                <span class="badge bg-primary rounded-pill">28-Sept-2023</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Pelatihan Validasi</div>
                                                    Kab. Tegal
                                                </div>
                                                <span class="badge bg-primary rounded-pill">31-Okt-2023</span>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </main>
            </div>
            </div>
