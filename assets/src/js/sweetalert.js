const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: flashData,
        showConfirmButton: false,
        timer: 1500
    });
}

// btn-delete
$('.btn-delete').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Hapus data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});
