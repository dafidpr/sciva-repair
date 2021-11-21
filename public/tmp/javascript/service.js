function forceDelete(e) {
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
        window.location = "/admin/servis/"+ e +"/forcedelete",
        Swal.fire(
        'Terhapus!',
        'Anda telah menghapus data.',
        'success'
        )
    }
    })

}
function softDelete(e) {
    Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data yang telah dihapus, masih dapat di Restore!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location = "/admin/servis/"+ e +"/delete",
        Swal.fire(
        'Terhapus!',
        'Anda telah menghapus data.',
        'success'
        )
    }
    })

}

function select_customer(e) {
    $.ajax({
        url: "/admin/servis/" + e + "/select_customer",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id_customer').val(obj.id);
            $('#name').val(obj.name);
            $('#telephone').val(obj.telephone);
            $('#address').val(obj.address);
            $('.bs-example-modal-lg').modal('hide');
            // $('#myModal').modal('show');
        }
    })
}
function detail_service(e) {
    $.ajax({
        url: "/admin/servis/" + e + "/detail_service",
        type: "get",
        success: function(data) {
            var cust = $('#detail_btn_service').data('customer');
            var tlp = $('#detail_btn_service').data('telephone');
            var obj = JSON.parse(data);
            $('#dnota').html(obj.transaction_code);
            $('#dcustomers').html(cust);
            $('#dtelephone').html(tlp);
            $('#dunit').html(obj.unit);
            $('#dcomplient').html(obj.complient);
            $('#dcompletenes').html(obj.completenes);
            $('#dpasscode').html(obj.passcode);
            $('#dnotes').html(obj.notes);
            $('#dseri').html(obj.serial_number);
            $('#destimated_cost').html(obj.estimated_cost);
            $('#DetailModals').modal('show');
        }
    })
}

function hargaService(b,a) {
    $.ajax({
        url: "/admin/servis/" + a + "/json_service",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#transaction_code').val(obj.transaction_code);
            $('#transaction_id').val(obj.id);
            $('#name_customer').val(b);
            $('#unit').val(obj.unit);
            $('#complient').val(obj.complient);
            $('#estimated_cost').val(obj.estimated_cost);
            $('#editStatusService').modal('show');
            // $('#myModal').modal('show');
        }
    })
}


$(document).ready(function() {
    $("#sparepart, #jasa").change(function() {


        var sp  = $("#sparepart option:selected").data('selling_price');

        // console.log(sp);
        var js = $("#jasa option:selected").data('price');

        var total = parseFloat(sp) + parseFloat(js);
        $("#sub_total").val(total);
        $("#total").val(total);

        $('#discount').keyup(function () {
            var ds = $('#discount').val();
            // var t = $('#sub_total').val();

            let gt = parseFloat(total) - parseFloat(ds);

            if(!isNaN(gt)){

                $('#sub_total').val(gt);
            }else{

                $('#sub_total').val(total);
            }

        })

    });
});



$(document).ready(function() {
    $('#sparepart').select2({
        maximumSelectionLength: 4
    });

});
$(document).ready(function() {
    $('#jasa').select2({
        maximumSelectionLength: 4
    });

});
