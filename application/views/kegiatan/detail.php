<?php 

	// mengubah nama hari dari bahas ainggris ke bahasa indonesia
	$hari = date("l", strtotime($kegiatan->waktu_mulai));
	switch($hari){
		case 'Sunday':
			$hari = "Minggu";
		break;
		case 'Monday':			
			$hari = "Senin";
		break;
		case 'Tuesday':
			$hari = "Selasa";
		break;
		case 'Wednesday':
			$hari = "Rabu";
		break;
		case 'Thursday':
			$hari = "Kamis";
		break;
		case 'Friday':
			$hari = "Jumat";
		break;
		case 'Saturday':
			$hari = "Sabtu";
		break;
		default:
			$hari = "Tidak ada";		
		break;
	}

	$tanggalMulai = date("j F Y", strtotime($kegiatan->waktu_mulai));
	$tanggalSelesai = date("j F Y", strtotime($kegiatan->waktu_selesai));

	$jamMulai = date("H:i", strtotime($kegiatan->waktu_mulai));
	$jamSelesai = date("H:i", strtotime($kegiatan->waktu_selesai));

	
	$waktuAwal = strtotime($kegiatan->waktu_mulai); // Waktu awal dalam bentuk timestamp
	$waktuAkhir = strtotime($kegiatan->waktu_selesai); // Waktu akhir dalam bentuk timestamp
	
	// Memeriksa apakah nilai timestamp valid sebelum perhitungan
	if ($waktuAwal !== false && $waktuAkhir !== false) {
		// Menghitung selisih waktu dalam detik
		$selisihDetik = $waktuAkhir - $waktuAwal;
	
		$satuanWaktu = "";
	
		if ($selisihDetik < 60) {
			// Kurang dari 60 detik, satuannya adalah detik
			$satuanWaktu = $selisihDetik . " detik";
		} elseif ($selisihDetik < 3600) {
			// Kurang dari 3600 detik (60 menit), satuannya adalah menit
			$selisihMenit = floor($selisihDetik / 60);
			$satuanWaktu = $selisihMenit . " menit";
		} else {
			// Lebih dari 3600 detik (1 jam), menghitung jam dan menit
			$selisihJam = floor($selisihDetik / 3600);
			$selisihMenit = floor(($selisihDetik % 3600) / 60);
			$satuanWaktu = $selisihJam . " jam " . $selisihMenit . " menit";
		}
	}

	$file = $kegiatan->file;
	$fileArray = explode(",", $file);

	if (!isset($fileArray[0]) || $fileArray[0] == "") {
		$fileArray[0] = "File belum diunggah!";
	} else {
		$fileArray[0] = $fileArray[0];
	} 

	if (!isset($fileArray[1]) || $fileArray[1] == "") {
		$fileArray[1] = "File belum diunggah!";
	} else {
		$fileArray[1] = $fileArray[1];
	}

	if (!isset($fileArray[2]) || $fileArray[2] == "") {
		$fileArray[2] = "File belum diunggah!";
	} else {
		$fileArray[2] = $fileArray[2];
	}
?>


<div id="layoutSidenav_content">
    <main>

			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
			<?php if ($this->session->flashdata('error')) : ?>
				<?php unset($_SESSION['error']); ?>
			<?php endif; ?>

			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
			<?php if ($this->session->flashdata('success')) : ?>
				<?php unset($_SESSION['success']); ?>
			<?php endif; ?>

        <div class="container-fluid px-4">
            <div class="card mt-2">
				<div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0"><i class="fas fa-calendar me-1"></i> Detail Jadwal Kegiatan</h6>
					<div class="d-flex justify-content-between align-items-center">
						<button type="button" class="btn btn-primary btn-sm mr-3" aria-pressed="false" data-toggle="modal" data-target="#ButtonEdit">
							<i class="fa-solid fa-pen-to-square"></i>
                    	</button>
						<a href="<?= base_url('kegiatan/delete/'.$kegiatan->id) ?>" class="btn btn-danger btn-sm btn-delete"><i class="fa-solid fa-trash"></i></a>

						</div>
                	</div>
                <div class="card-body d-flex flex-column align-items-center">
					<div class="d-flex flex-column align-items-center w-75">
						<h2><?= $kegiatan->kegiatan; ?></h2>
						<p class="text-center"><?= $kegiatan->tema; ?></p>
						<div class="d-flex justify-content-between w-100 mt-3">
            				<div class="d-flex flex-row align-items-center">
								<div class="d-inline-block" style="background-color: #f0f0f0; padding: 10px; border-radius: 10px;">
    								<i class="fas fa-home fa-lg"></i>
								</div>
                				<div class="d-flex flex-column ml-3">
									<h6 class="mt-2"><?= $kegiatan->tempat; ?></h6>
									<!-- <p class="text-left">Lorem</p> -->
								</div>
            				</div>
							<div class="d-flex flex-row align-items-center">
								<div class="d-inline-block" style="background-color: #f0f0f0; padding: 10px; border-radius: 10px;">
    								<i class="fas fa-calendar fa-lg"></i>
								</div>
                				<div class="d-flex flex-column ml-3">
									<h6 class="mt-3"><?= $hari ?></h6>
									<p class="text-left"><?= $tanggalMulai ?></p>
								</div>
            				</div>
							<div class="d-flex flex-row align-items-center">
								<div class="d-inline-block" style="background-color: #f0f0f0; padding: 10px; border-radius: 10px;">
    								<i class="fas fa-clock fa-lg"></i>
								</div>
                				<div class="d-flex flex-column ml-3">
									<h6 class="mt-3"><?= $jamMulai ?> - <?= $jamSelesai ?></h6>
									<p class="text-left"><?= $satuanWaktu ?></p>
								</div>
            				</div>
                		</div>

						<div class="w-100 mt-2" style="border-bottom: 1px solid #f0f0f0;"></div>
					
						<div class="d-flex flex-column justify-content-between w-100">
							
            				<div class="d-flex flex-row align-items-center justify-content-between">
								<div class="d-flex flex-row align-items-center">
									<div class="d-inline-block" style="background-color: #f0f0f0; padding: 8px; border-radius: 10px;">
										<i class="fa-solid fa-file-pdf fa-lg"></i>
									</div>
                					<div class="d-flex flex-column ml-3" >
										<h6 class="mt-3" >Surat Undangan</h6>
										<p class="text-left" ><?= $fileArray[0]; ?></p>
									</div>
								</div>
								<div class="d-flex flex-row align-items-center">
								<?php if ($fileArray[0] !== "File belum diunggah!") { ?>
									<a href="" class="btn btn-sm btn-primary btn-download mr-2"><i class="fa-solid fa-eye fa-sm"></i></a>
									<a href="<?= base_url('kegiatan/download_0/'.$kegiatan->id.'/'.$fileArray[0]) ?>" class="btn btn-sm btn-success btn-download ml-2"><i class="fa-solid fa-download fa-sm"></i></a>
								<?php } ?>
								</div>
							</div>

							<div class="w-100 mt-2" style="border-bottom: 1px solid #f0f0f0;"></div>

							<div class="d-flex flex-row align-items-center justify-content-between">
								<div class="d-flex flex-row align-items-center">
									<div class="d-inline-block" style="background-color: #f0f0f0; padding: 10px; border-radius: 10px;">
									<i class="fas fa-file-powerpoint fa-lg"></i>
									</div>
                					<div class="d-flex flex-column ml-3">
										<h6 class="mt-3">File Materi</h6>
										<p class="text-left"><?= $fileArray[1]; ?></p>
									</div>
								</div>
								<div class="d-flex flex-row align-items-center">
								<?php if ($fileArray[1] !== "File belum diunggah!") { ?>
									<a href="" class="btn btn-sm btn-primary btn-download mr-2"><i class="fa-solid fa-eye fa-sm"></i></a>
									<a href="<?= base_url('kegiatan/download_1/'.$kegiatan->id.'/'.$fileArray[1]) ?>" class="btn btn-sm btn-success btn-download ml-2"><i class="fa-solid fa-download fa-sm"></i></a>
								<?php } ?>
								</div>
							</div>

							<div class="w-100 mt-2" style="border-bottom: 1px solid #f0f0f0;"></div>

							<div class="d-flex flex-row align-items-center justify-content-between">
								<div class="d-flex flex-row align-items-center">
									<div class="d-inline-block" style="background-color: #f0f0f0; padding: 10px; border-radius: 10px;">
									<i class="fas fa-file-excel fa-lg"></i>
									</div>
                					<div class="d-flex flex-column ml-3">
										<h6 class="mt-3">File Metadata</h6>
										<p class="text-left"><?= $fileArray[2]; ?></p>
									</div>
								</div>
								<div class="d-flex flex-row align-items-center">
								<?php if ($fileArray[2] !== "File belum diunggah!") { ?>
									<a href="" class="btn btn-sm btn-primary btn-download mr-2"><i class="fa-solid fa-eye fa-sm"></i></a>
									<a href="<?= base_url('kegiatan/download_2/'.$kegiatan->id.'/'.$fileArray[2]) ?>" class="btn btn-sm btn-success btn-download ml-2"><i class="fa-solid fa-download fa-sm"></i></a>
								<?php } ?>
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

<div class="modal fade" id="ButtonEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Jadwal Kegiatan</h5>
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
				<form method="post" enctype="multipart/form-data" action="<?= base_url('kegiatan/edit/').$kegiatan->id?>">
					<div class="row">
						<div class="col-md-6">
							<input class="form-control" type="hidden" id="id" name="id" value="<?= $kegiatan->id ?>"/>
							<input class="form-control" type="hidden" id="old_file[]" name="old_file[]" value="<?= $kegiatan->file ?>" required/>
							<div class="form-group">
								<label for="kegiatan" class="col-form-label">Kegiatan</label>
								<input type="text" class="form-control" id="kegiatan" name="kegiatan" value="<?= $kegiatan->kegiatan ?>" required/>
							</div>
							<div class="form-group">
								<label for="tema" class="col-form-label">Tema</label>
								<input type="text" class="form-control" id="tema" name="tema" value="<?= $kegiatan->tema ?>" required/>
							</div>
							<div class="form-group">
								<label for="tempat" class="col-form-label">Tempat</label>
								<input type="text" class="form-control" id="tempat" name="tempat" value="<?= $kegiatan->tempat?>" required/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="waktu_mulai" class="col-form-label">Mulai</label>
								<input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?= $kegiatan->waktu_mulai?>" required/>
							</div>
							<div class="form-group">
								<label for="waktu_selesai" class="col-form-label">Selesai</label>
								<input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai" value="<?= $kegiatan->waktu_selesai ?>" required/>
							</div>
							<div class="form-group">
								<label for="color" class="col-form-label">Warna</label>
									<select name="color" class="form-control" id="color">
									<?php
											$colorOptions = [
												'#0071c5' => 'Blue',
												'#008000' => 'Hijau',
												'#FFD700' => 'Yellow',
												'#FF8C00' => 'Orange',
												'#FF0000' => 'Red'
											];

											$selectedColor = $kegiatan->color;

											foreach ($colorOptions as $value => $label) {
												$isSelected = ($selectedColor === $value) ? 'selected' : '';
												echo "<option style=\"color:$value;\" value=\"$value\" $isSelected>&#9724; $label</option>";
											}
											?>
									</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="file[]" class="col-form-label">File Undangan</label>
						<input type="file" class="form-control" id="file[]" name="file[]" accept=".pdf, .doc, .docx"/>
					</div>
					<div class="form-group">
						<label for="file[]" class="col-form-label">File Materi</label>
						<input type="file" class="form-control" id="file[]" name="file[]" accept=".pptx, .ppt, .pdf"/>
					</div>
					<div class="form-group">
						<label for="file[]" class="col-form-label">File Metadata</label>
						<input type="file" class="form-control" id="file[]" name="file[]" accept=".xls, .xlsx, .csv"/>
					</div>
					<div class="d-flex align-items-center justify-content-center mt-3 mb-0">
						<button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
