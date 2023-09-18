<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-2">
				<div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0"><i class="fas fa-table me-1"></i> Schedule</h6>
                    <button type="button" class="btn btn-primary btn-sm" aria-pressed="false" data-toggle="modal" data-target="#UploadModal">
					<h6 class="m-0"><i class="fas fa-plus me-1"></i> Jadwal</h6>
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
				<form method="post" enctype="multipart/form-data" id="add">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kegiatan" class="col-form-label">Kegiatan</label>
								<input type="text" class="form-control" id="kegiatan" name="kegiatan"/>
							</div>
							<div class="form-group">
								<label for="tema" class="col-form-label">Tema</label>
								<input type="text" class="form-control" id="tema" name="tema"/>
							</div>
							<div class="form-group">
								<label for="tempat" class="col-form-label">Tempat</label>
								<input type="text" class="form-control" id="tempat" name="tempat"/>
							</div>
							<div class="form-group">
								<label for="tanggal" class="col-form-label">Tanggal</label>
								<input type="date" class="form-control" id="tanggal" name="tanggal"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="waktu_mulai" class="col-form-label">Waktu Mulai</label>
								<input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai"/>
							</div>
							<div class="form-group">
								<label for="waktu_selesai" class="col-form-label">Waktu Selesai</label>
								<input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai"/>
							</div>
							<div class="form-group">
								<label for="file_materi" class="col-form-label">File Materi</label>
								<input type="file" class="form-control" id="file_materi" name="file_materi"/>
							</div>
							<div class="form-group">
								<label for="file_metadata" class="col-form-label">File Metadata</label>
								<input type="file" class="form-control" id="file_metadata" name="file_metadata"/>
							</div>
						</div>
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
	timeZone: 'Asia/Jakarta',
	firstDay: 1,
	nowIndicator: true,
	height: 'auto',
	width: 'auto',
	headerToolbar: {
		left: 'title',
		right: 'prev,today,next'
	},
	dayHeaderFormat: {
		weekday: 'long'
	},

	// trigger when an event is clicked
	eventClick: function(info) {
		info.jsEvent.preventDefault();

    if (info.event.url) {
		window.open(info.event.url);
    } else {
			alert('Clicked ' + info.event.title);

		}
	},

	events: [
    {
      title:  'Test Event',
      start:  '2023-09-18 12:00:00',
			end:    '2023-09-18 15:00:00',
			url: '',
      allDay: false
    },    
		{
      title:  'Test Event',
      start:  '2023-09-18 17:00:00',
			end:    '2023-09-18 15:00:00',
			url: '',
      allDay: false
    }
  ],
  eventTimeFormat: { 
    hour: '2-digit',
    minute: '2-digit',
    hour12: false
  },

	locale: 'id'

	});

	calendar.setOption('locale', 'id');
	calendar.render();

});

</script>


