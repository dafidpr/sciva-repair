function hapusdatarole(e) {
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
        window.location = "/admin/karyawan/deleteRole/" + e,
        Swal.fire(
        'Deleted!',
        'Data telah terhapus.',
        'success'
        )
    }
    })

}
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


function editRole(e) {
    $.ajax({
        url: "/admin/karyawan/detailRole/" + e,
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#idRole').val(obj.id);
            $('#roleEdit').val(obj.name);
            $('.myEditRole').modal('show');
        }
    })
}

function editKaryawan(e) {
    $.ajax({
        url: "/admin/karyawan/detail/" + e,
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id').val(obj.data.id);
            $('#e_name').val(obj.data.name);
            $('#e_telephone').val(obj.data.telephone);
            $('.e_address').val(obj.data.address);
            $('.e_role').val(obj.role);
            $('#e_username').val(obj.data.username);
            $('#e_commission').val(obj.data.commission);
            $('#myEditModal').modal('show');
        }
    })
}
