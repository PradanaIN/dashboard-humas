<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Badan Pusat Statistik</title>
		<link rel="icon" href="<?= base_url('assets/'); ?>img/logo.png" type="image/gif" sizes="25x25">
        <link href="<?= base_url("assets/dist/")?>css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body style="overflow: hidden;">

			<div class="flash-error" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
			<?php if ($this->session->flashdata('message')) : ?>
				<?php unset($_SESSION['message']); ?>
			<?php endif; ?>

		<div class="row">
			<div class="col d-flex justify-content-center"> 
				<div class="card shadow-2-strong mt-5" style="border-radius: 1rem">
				<div class="card-body p-5 text-center">
        			<img src="<?= base_url("assets/img/logo-bps-provinsi-jateng.png") ?>" style="width: 300px;">
        			<form action="<?= base_url('auth/index')?>" method="post">
            			<div class="input-group form-outline mt-5">
                			<span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                			<input type="email" id="email" name="email" placeholder="Email"  value="<?= set_value('email') ?>" class="form-control form-control-lg" required/>
						</div>
						<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            			<div class="input-group form-outline mt-5">
                			<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                			<input type="password" id="password" name="password" placeholder="Password" class="form-control form-control-lg" required/>
						</div>
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
						<div class="input-group">
            				<button class="btn btn-primary btn-lg btn-block mt-5 w-100" type="submit">Login</button>
						</div>
					</form>
    			</div>
				</div>
			</div>
		</div>
    </body>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/dist/'); ?>js/scripts.js"></script>
	
	<!-- SweetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?= base_url('assets/src/') ?>js/sweetalert.js"></script>
</html>


<style>
	.btn-primary {
	border: #5194FF;
    background-color: #5194FF;
    color: #fff;
}
</style>
