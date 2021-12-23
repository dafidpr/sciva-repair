function receivableforceDelete(e) {
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
            window.location = "/admin/restore/forceDeleteReceivable/" + e,
                Swal.fire(
                    'Terhapus!',
                    'Anda telah menghapus data.',
                    'success'
                )
        }
    })

}
function receivabledeletepermanent() {
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
            window.location = "/admin/restore/forceDeleteReceivable/",
                Swal.fire(
                    'Terhapus!',
                    'Anda telah menghapus data.',
                    'success'
                )
        }
    })

}
function receivablerestoreallid(e) {
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
            window.location = "/admin/restore/forceRestoreReceivable/" + e,
                Swal.fire(
                    'Data telah Restore!',
                    'Coba anda lihat di halaman utama.',
                    'success'
                )
        }
    })

}
function receivablerestoreall() {
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
            window.location = "/admin/restore/forceRestoreReceivable/",
                Swal.fire(
                    'Data telah Restore!',
                    'Coba anda lihat di halaman utama.',
                    'success'
                )
        }
    })

}
