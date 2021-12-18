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
            window.location = "/admin/servis/deletepermanent/" + e,
                Swal.fire(
                    'Terhapus!',
                    'Anda telah menghapus data.',
                    'success'
                )
        }
    })

}
function deletepermanent() {
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
            window.location = "/admin/servis/deletepermanent/",
                Swal.fire(
                    'Terhapus!',
                    'Anda telah menghapus data.',
                    'success'
                )
        }
    })

}
function restoreallid(e) {
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
            window.location = "/admin/servis/restoreall/" + e,
                Swal.fire(
                    'Data telah Restore!',
                    'Coba anda lihat di halaman utama.',
                    'success'
                )
        }
    })

}
function restoreall() {
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
            window.location = "/admin/servis/restoreall/",
                Swal.fire(
                    'Data telah Restore!',
                    'Coba anda lihat di halaman utama.',
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
            window.location = "/admin/servis/" + e + "/delete",
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
        success: function (data) {
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
        success: function (data) {
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

function takeUnit(a, b) {
    $.ajax({
        url: "/admin/servis/" + b + "/detail_service",
        type: "get",
        success: function (data) {
            var obj = JSON.parse(data);
            $('#t_transaction_code').val(obj.transaction_code);
            $('#t_sv').val(obj.id);
            $('#t_customer').val(a);
            $('#t_unit').val(obj.unit);
            $('#t_serial_number').val(obj.serial_number);
            $('#t_total').val(obj.total);
            $('#takeUnit').modal('show');
            // $('#myModal').modal('show');
        }
    })
}

function modCall(){
    $('#callcustomer').modal('show');
}

function es_cashback() {
    var a = document.getElementById('t_total').value
    var b = document.getElementById('t_payment').value

    var h = parseInt(b) - parseInt(a)

    if (!isNaN(h)) {
        document.getElementById('t_cashback').value = h
    } else {
        document.getElementById('t_cashback').value = 0

    }
}
function hargaService(b, a) {
    $.ajax({
        url: "/admin/servis/" + a + "/json_service",
        type: "get",
        success: function (data) {
            var obj = JSON.parse(data);
            $('#transaction_code').val(obj.transaction_code);
            $('#transaction_id').val(obj.id);
            $('#name_customer').val(b);
            $('#unit').val(obj.unit);
            $('#complient').val(obj.complient);
            $('#estimated_cost').val(obj.estimated_cost);
            $('#estimated_cost').val(obj.estimated_cost);
            $('#editStatusService').modal('show');
            // $('#myModal').modal('show');
        }
    })
}
function batalData() {
    var id = $('#transaction_id').val();
    window.location = "/admin/servis/batalServis/" + id
}


$(document).ready(function () {
    $("#sparepart, #jasa").change(function () {


        var sp = $("#sparepart option:selected").data('selling_price');

        // console.log(sp);
        var js = $("#jasa option:selected").data('price');

        var total = parseFloat(sp) + parseFloat(js);
        $("#sub_total").val(total);
        $("#total").val(total);

        $('#discount').keyup(function () {
            var ds = $('#discount').val();
            // var t = $('#sub_total').val();

            let gt = parseFloat(total) - parseFloat(ds);

            if (!isNaN(gt)) {

                $('#sub_total').val(gt);
            } else {

                $('#sub_total').val(total);
            }

        })

    });
});



$(document).ready(function () {
    $('#sparepart').select2({
        maximumSelectionLength: 4
    });

});
$(document).ready(function () {
    $('#jasa').select2({
        maximumSelectionLength: 4
    });

});
$(document).ready(function () {
    $('#technician').select2({
        maximumSelectionLength: 4
    });

});
