const flashSatu = $('.flash-satu').data('satu');
if (flashSatu) {
    Swal.fire('Satu', 'Satu', 'success');
}
const flashDua = $('.flash-dua').data('dua');
if (flashDua) {
    Swal.fire('dua', 'dua', 'success');
}
const ubah = $('.success-ubah').data('successubah');
if (ubah) {
    Swal.fire('Berhasil', 'Di Ubah', 'success');
}