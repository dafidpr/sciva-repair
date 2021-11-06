function hapusdatauser(e) {
    Swal.fire({
    title: 'Apa Anda yakin?',
    text: "Data yang telah dihapus tidak dapat di kembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location = "/admin/karyawan/hapusdata/" + e,
        Swal.fire(
        'Deleted!',
        'Data telah terhapus.',
        'success'
        )
    }
    })

}


function editKaryawan(e) {
    $.ajax({
        url: "/admin/karyawan/detail/" + e,
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id').val(obj.id);
            $('#name').val(obj.name);
            $('#telephone').val(obj.telephone);
            $('.address').val(obj.address);
            // $('#address').val(obj.address);
            $('#username').val(obj.username);
            $('#myEditModal').modal('show');
        }
    })
}
