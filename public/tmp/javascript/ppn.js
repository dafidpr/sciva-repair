function hapusdata(e) {
    Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data yang telah dihapus tidak dapat dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location = "/admin/ppn/"+ e +"/delete_vat",
        Swal.fire(
        'Terhapus!',
        'Anda telah menghapus data.',
        'success'
        )
    }
    })

}
