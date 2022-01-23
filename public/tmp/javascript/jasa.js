function hapusdatajasa(e) {
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
        window.location = "/admin/jasa/"+ e +"/delete",
        Swal.fire(
        'Terhapus!',
        'Anda telah menghapus data.',
        'success'
        )
    }
    })

}


function editJasa(e) {
    $.ajax({
        url: "/admin/jasa/detail/" + e,
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id').val(obj.id);
            $('#repaire_code').val(obj.repaire_code);
            $('#name').val(obj.name);
            $('#price').val(parseInt(obj.price));
            $('#myEditModal').modal('show');
        }
    })
}
