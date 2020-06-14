const errorTambah = $('.tambah-error').data('errortambah');
if (errorTambah) {
    Swal.fire('Gagal', 'Ditambahkan', 'error');
}
const successTambah = $('.success-tambah').data('successtambah');
if (successTambah) {
    Swal.fire('Berhasil', 'Ditambahkan', 'success');
}
$('.hapus').on('click', function (e) {
    e.preventDefault()
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Anda yakin?',
        text: "menghapus data !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

})
const successHapus = $('.success-hapus').data('successhapus');
if (successHapus) {
    Swal.fire('Berhasil', 'Di Hapus', 'success');
}
const errorUbah = $('.error-ubah').data('errorubah');
if (errorUbah) {
    Swal.fire('Gagal', 'Di Ubah', 'error');
}