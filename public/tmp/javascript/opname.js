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
        window.location = "/admin/stockopname/"+ e +"/delete",
        Swal.fire(
        'Terhapus!',
        'Anda telah menghapus data.',
        'success'
        )
    }
    })

}


function select_product(e) {
    $.ajax({
        url: "/admin/stockopname/" + e + "/select_product",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id').val(obj.id);
            $('#barcode').val(obj.barcode);
            $('#name').val(obj.name);
            $('#stock').val(obj.stock);
            $('#purchase_price').val(obj.purchase_price);
            $('.bs-example-modal-lg').modal('hide');
            // $('#myModal').modal('show');
        }
    })
}

