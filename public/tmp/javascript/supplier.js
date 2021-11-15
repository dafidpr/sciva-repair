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
        window.location = "/admin/supplier/"+ e +"/delete",
        Swal.fire(
        'Terhapus!',
        'Anda telah menghapus data.',
        'success'
        )
    }
    })

}


function editData(e) {
    $.ajax({
        url: "/admin/supplier/detail/" + e,
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#e_id').val(obj.id);
            $('#e_supplier_code').val(obj.supplier_code);
            $('#e_name').val(obj.name);
            $('#e_telephone').val(obj.telephone);
            $('#e_bank').val(obj.bank);
            $('#e_account_number').val(obj.account_number);
            $('#e_bank_account_name').val(obj.bank_account_name);
            $('#e_address').val(obj.address);
            $('#myEditModal').modal('show');
        }
    })
}
