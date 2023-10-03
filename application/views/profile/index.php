<?php 
// apabila user belum login
if ($this->session->userdata('is_login') != 'true') {
	redirect('auth');
} 

// from user session, get user data from database
$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

$name = $user['nama'];
$email = $user['email'];
$image = $user['image'];
$date_created = $user['date_created'];

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Profile
                </div>
                <div class="card-body">
					<div class="row">
						<div class="col-lg-4">
							<div class="card mb-4">
								<div class="card-body text-center">
									<div class="rounded-circle">
									<img src="<?= base_url('upload/image/').$image?>" alt="avatar"
										class="img-fluid" style="width: 100%; height: auto;">
									</div>
									<h5 class="my-3"><?= $name ?></h5>
									<div class="d-flex justify-content-center mb-2 mt-5">
										<button type="button" class="btn btn-primary">Edit Profile</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="card mb-4">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-3">
											<p class="mb-0">Nama</p>
										</div>
										<div class="col-sm-9">
											<p class="text-muted mb-0"><?= $name ?></p>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<p class="mb-0">Email</p>
										</div>
										<div class="col-sm-9">
											<p class="text-muted mb-0"><?= $email ?></p>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<p class="mb-0">Date Created</p>
										</div>
										<div class="col-sm-9">
											<p class="text-muted mb-0"><?= $date_created ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
