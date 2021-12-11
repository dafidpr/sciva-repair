function hapusdatabarang(e) {
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location = "/admin/barang/hapusdata/" + e,
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    }
    })

}

function editProductA(e) {
    console.log(e)
        $.ajax({
            url: "/admin/barang/detail/" + e,
            type: "get",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#id').val(obj.id);
                $('#barcode').val(obj.barcode);
                $('#name').val(obj.name);
                $('#selling_price').val(obj.selling_price);
                $('#purchase_price').val(obj.purchase_price);
                $('#member_price').val(obj.member_price);
                $('#limit').val(obj.limit);
                $('#supplier_id').val(obj.supplier_id);
                $('#myEditModal').modal('show');
            }
        })
}
