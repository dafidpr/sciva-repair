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

function modCall(a, c, d, e){
    $('#callcustomer').modal('show');
    callcs(a, c, d, e)
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
    var st = $('#subtot_jasa').val();
    window.location = "/admin/servis/batalServis/" + id+"/"+st
}

function pilih_jasa_servis(e) {
    $.ajax({
        url: "/admin/servis/" + e + "/select_repaire",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            // alert()
            $('#jasa_id').val(obj.id);
            $('#jasa_name').val(obj.name);
            $('#jasa_price').val(obj.price);
            $('.bs-modal-lg-js').modal('hide');
            // $('#myModal').modal('show');
        }
    })
}
function pilih_sparepart_servis(e) {
    // var d = document.getElementById('discount_prod').value
    $.ajax({
        url: "/admin/stockopname/" + e + "/select_product",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id_product').val(obj.id);
            $('#item_product').val(obj.name);
            $('#item_price').val(obj.selling_price);
            $('.bs-modal-sparepart').modal('hide');
            // $('#myModal').modal('show');
        }
    })
}


function tambahJasaService(){
    var tbody_jasa = document.getElementById('tbody_jasa_servis_op')
    var jasa_name = document.getElementById('jasa_name').value
    var jasa_id = document.getElementById('jasa_id').value
    var jasa_price = document.getElementById('jasa_price').value

    tbody_jasa.innerHTML += `<tr>
    <td>${jasa_name}<input type="hidden" class="form-control" name="input_jasa_id[]" id="" value="${jasa_id}" readonly> <input type="hidden" class="form-control" name="input_jasa_name[]" id="" value="${jasa_name}" readonly> <input type="hidden" class="form-control" name="input_jasa_price[]" id="" value="${jasa_price}" readonly></td>
    <td>${jasa_price}</td>
    <td><button class="btn btn-sm btn-danger del-js"><i class="fas fa-trash del-js"></i></button></td></tr>`

    changeTotalJasa()
    TotalHargaService()
}

function tambahSparepartService(){
    var tbody_sparepart = document.getElementById('tbody_sparepart')
    var item_product = document.getElementById('item_product').value
    var id_product = document.getElementById('id_product').value
    var item_price = document.getElementById('item_price').value
    var qty_prod = document.getElementById('qty_prod').value
    var discount_prod = document.getElementById('discount_prod').value

    var a = parseInt(item_price) * parseInt(qty_prod) - parseInt(discount_prod)

    if(qty_prod == ''){
        alert('Quantity harus diisi!!');
    }else{

            if(item_product == ''){
                alert('data tidak boleh kosong!!')
            }else{

                tbody_sparepart.innerHTML += `<tr>
                <td>${item_product}<input type="hidden" class="form-control" name="input_product_id[]" id="" value="${id_product}" readonly><input type="hidden" class="form-control" name="input_product_subtot[]" id="" value="${a}" readonly></td>
                <td>${item_price}<input type="hidden" class="form-control" name="input_product_total[]" id="" value="${item_price}" readonly> <input type="hidden" class="form-control" name="input_product_qty[]" id="" value="${qty_prod}" readonly></td>
                <td>${qty_prod} <input type="hidden" class="form-control" name="input_product_dis[]" id="" value="${discount_prod}" readonly></td>
                <td>${discount_prod}</td>
                <td>${a}</td>
                <td><button class="btn btn-sm btn-danger del-spr"><i class="fas fa-trash del-spr"></i></button></td></tr>`

                changeTotalSparepart()
                TotalHargaService()
                changeTotalDiscountSparepart()
            }

    }


}

function onDeleteJasaService(e) {
    if (!e.target.classList.contains('del-js')) {
        return;
    }
    // alert('click the button');
    const btn = e.target;
    btn.closest('tr').remove();

    changeTotalJasa()
    TotalHargaService()

}
function onDeleteSparepart(e) {
    if (!e.target.classList.contains('del-spr')) {
        return;
    }
    // alert('click the button');
    const btn = e.target;
    btn.closest('tr').remove();

    // changeTotalJasa()
    changeTotalSparepart()
    TotalHargaService()
    changeTotalDiscountSparepart()

}
var table_sparepart = document.getElementById('table_sparepart')
var tableJasaService = document.getElementById('jasa_servis_op')
tableJasaService.addEventListener('click', onDeleteJasaService);
table_sparepart.addEventListener('click', onDeleteSparepart);

function changeTotalJasa() {
    tableJasaService = document.getElementById('jasa_servis_op')
    var sumHsl = 0;
    var subtot_jasa = document.getElementById("subtot_jasa").value;
    for(var t = 1; t < tableJasaService.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(tableJasaService.rows[t].cells[1].innerHTML);
    }
    // console.log(sumHsl);
    document.getElementById("subtot_jasa").value = sumHsl;
}
function changeTotalSparepart() {
    table_sparepart = document.getElementById('table_sparepart')
    var sumHsl = 0;

    for(var t = 1; t < table_sparepart.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(table_sparepart.rows[t].cells[4].innerHTML);
    }
    // console.log(sumHsl);
    document.getElementById("subtot_prod").value = sumHsl;
}
function changeTotalDiscountSparepart() {
    table_sparepart = document.getElementById('table_sparepart')
    var sumHsl = 0;

    for(var t = 1; t < table_sparepart.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(table_sparepart.rows[t].cells[3].innerHTML);
    }
    // console.log(sumHsl);
    document.getElementById("total_discount").value = sumHsl;
}

function TotalHargaService(){
    var subtot_prod = document.getElementById('subtot_prod').value
    var subtot_jasa = document.getElementById('subtot_jasa').value
    var total = parseInt(subtot_prod) + parseInt(subtot_jasa)

    document.getElementById('sub_total').value = total
}


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

function callcs(a, c, d, e) {
    $.ajax({
        url: "/admin/format_WA/format_wa_get",
        type: "get",
        success: function (data) {
            var obj = JSON.parse(data);
            var el = document.getElementById('call_cs')
            var b = obj.wa.value
            var sms = obj.sms.value

            if(d == 'finished'){
                var st = 'selesai'
            }else if(d == 'cancelled'){
                var st = 'batal'
            }


            const text = b.replace('{code}', c)
            const text2 = text.replace('{status}', st)
            const text3 = text2.replace('{harga}', e)
            const text4 = text3.replace('{batas}', obj.batas.value)
            const text5 = text4.replace('{batas_type}', obj.batas_hari.value)

            const messages = sms.replace('{code}', c)
            const messages2 = messages.replace('{status}', st)
            const messages3 = messages2.replace('{harga}', e)
            const messages4 = messages3.replace('{batas}', obj.batas.value)
            const messages5 = messages4.replace('{batas_type}', obj.batas_hari.value)

            el.innerHTML = `<div class="row">
            <div class="col-sm-4">
                <a href="whatsapp://send?text=${text5}&phone=+62${a}"><i class="fab fa-whatsapp-square fa-10x"></i></a>
            </div>
            <div class="col-sm-4">
                <a href="sms:+62${a}?body=${messages5}"><i class="fas fa-envelope-square fa-10x"></i></a>
            </div>
            <div class="col-sm-4">
                <a href="tel://${a}"><i class="fas fa-phone-square-alt fa-10x"></i></a>
            </div></div>`
        }
    })

}
