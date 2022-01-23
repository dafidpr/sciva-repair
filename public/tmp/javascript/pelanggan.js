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
        window.location = "/admin/pelanggan/"+ e +"/delete",
        Swal.fire(
        'Terhapus!',
        'Anda telah menghapus data.',
        'success'
        )
    }
    })

}
function changePtoD(e) {
    Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Password akan kembali ke Default!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Yakin!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location = "/admin/pelanggan/editPtoD/"+e,
        Swal.fire(
        'Berhasil!',
        'Password telah Di Reset ke Default.',
        'success'
        )
    }
    })

}


function editData(e) {
    $.ajax({
        url: "/admin/pelanggan/detail/" + e,
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id').val(obj.id);
            $('#name').val(obj.name);
            $('#telephone').val(obj.telephone);
            $('#address').val(obj.address);
            $('#type').val(obj.type);
            $('#myEditModal').modal('show');
        }
    })
}
