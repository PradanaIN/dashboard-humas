
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
			<?php if ($this->session->flashdata('success')) : ?>
				<?php unset($_SESSION['success']); ?>
			<?php endif; ?>

            <div class="card mt-2">
				<div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0"><i class="fas fa-calendar me-1"></i> Jadwal Kegiatan</h6>
                    <button type="button" class="btn btn-primary btn-sm" aria-pressed="false" data-toggle="modal" data-target="#UploadModal">
					<h6 class="m-0"><i class="fas fa-plus me-1"></i> Tambah Jadwal</h6>
                    </button>
                </div>
                <div class="card-body">
					<div id='calendar'></div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>



<div class="modal fade" id="UploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Kegiatan</h5>
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
				<form method="post" enctype="multipart/form-data" id="add" action="<?= base_url('kegiatan/add') ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kegiatan" class="col-form-label">Kegiatan</label>
								<input type="text" class="form-control" id="kegiatan" name="kegiatan" required/>
							</div>
							<div class="form-group">
								<label for="tema" class="col-form-label">Tema</label>
								<input type="text" class="form-control" id="tema" name="tema" required/>
							</div>
							<div class="form-group">
								<label for="tempat" class="col-form-label">Tempat</label>
								<input type="text" class="form-control" id="tempat" name="tempat" required/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="waktu_mulai" class="col-form-label">Mulai</label>
								<input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai" required/>
							</div>
							<div class="form-group">
								<label for="waktu_selesai" class="col-form-label">Selesai</label>
								<input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai" required/>
							</div>
							<div class="form-group">
								<label for="color" class="col-form-label">Warna</label>
									<select name="color" class="form-control" id="color">
										<option style="color:#0071c5;" value="#0071c5">&#9724; Biru</option>
										<option style="color:#008000;" value="#008000">&#9724; Hijau</option>										
										<option style="color:#FFD700;" value="#FFD700">&#9724; Kuning</option>
										<option style="color:#FF0000;" value="#FF0000">&#9724; Merah</option>
									</select>
							</div>
						</div>s
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
						<button type="submit" class="btn btn-primary btn-user btn-block">Tambah</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>



<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>



document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
	initialView: 'dayGridMonth',
	height: 'auto',
	width: 'auto',
	locale: 'id',
	timeZone: 'Asia/Jakarta',
	firstDay: 1,
	nowIndicator: true,
	headerToolbar: {
		left: 'title',
		right: 'prev,today,next'
	},
	dayHeaderFormat: {
		weekday: 'long'
	},
	eventTimeFormat: { 
		hour: '2-digit',
		minute: '2-digit',
		hour12: false
	},

	events: [
			<?php foreach ($kegiatan as $row) : ?>
				{
					title: '<?= $row->kegiatan; ?>',
					start: '<?= $row->waktu_mulai; ?>',
					end: '<?= $row->waktu_selesai; ?>',
					color: '<?= $row->color; ?>',
					url: '<?= base_url('kegiatan/detail/'.$row->id) ?>'
				},
			<?php endforeach; ?>
			],

	eventClick: function(info) {
		info.jsEvent.preventDefault();

		if (info.event.url) {
			window.open(info.event.url);
		} else {
			alert('Clicked ' + info.event.title);
		}
	},

	});

	calendar.setOption('locale', 'id');
	calendar.render();

});

</script>


