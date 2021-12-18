function saleforceDelete(e) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang telah dihapus, Tidak Dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/admin/restore/forceDeleteSale/" + e,
                Swal.fire(
                    'Terhapus!',
                    'Anda telah menghapus data.',
                    'success'
                )
        }
    })

}
function saledeletepermanent() {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang telah dihapus, Tidak Dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/admin/restore/forceDeleteSale/",
                Swal.fire(
                    'Terhapus!',
                    'Anda telah menghapus data.',
                    'success'
                )
        }
    })

}
function salerestoreallid(e) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Untuk merestore data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Restore!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/admin/restore/forceRestoreSale/" + e,
                Swal.fire(
                    'Data telah Restore!',
                    'Coba anda lihat di halaman utama.',
                    'success'
                )
        }
    })

}
function salerestoreall() {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Untuk merestore data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Restore!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/admin/restore/forceRestoreSale/",
                Swal.fire(
                    'Data telah Restore!',
                    'Coba anda lihat di halaman utama.',
                    'success'
                )
        }
    })

}
