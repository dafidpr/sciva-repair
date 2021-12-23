function purchaseforceDelete(e) {
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
            window.location = "/admin/restore/forceDeletePurchase/" + e,
                Swal.fire(
                    'Terhapus!',
                    'Anda telah menghapus data.',
                    'success'
                )
        }
    })

}
function purchasedeletepermanent() {
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
            window.location = "/admin/restore/forceDeletePurchase/",
                Swal.fire(
                    'Terhapus!',
                    'Anda telah menghapus data.',
                    'success'
                )
        }
    })

}
function purchaserestoreallid(e) {
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
            window.location = "/admin/restore/forceRestorePurchase/" + e,
                Swal.fire(
                    'Data telah Restore!',
                    'Coba anda lihat di halaman utama.',
                    'success'
                )
        }
    })

}
function purchaserestoreall() {
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
            window.location = "/admin/restore/forceRestorePurchase/",
                Swal.fire(
                    'Data telah Restore!',
                    'Coba anda lihat di halaman utama.',
                    'success'
                )
        }
    })

}
