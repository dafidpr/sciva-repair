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
function detail_service(e, cust, tlp, address, teknisi, optr) {
    $.ajax({
        url: "/admin/servis/" + e + "/detail_service",
        type: "get",
        success: function (data) {
            // var cust = $('#detail_btn_service').data('customer');
            // var tlp = $('#detail_btn_service').data('telephone');
            // var address = $('#detail_btn_service').data('alamat');
            var obj = JSON.parse(data);
            var sv_dt = new Date(`${obj.service_date}`);
            if(obj.total == null){
                var total = '-'
            }else{
                var total = "Rp." + new Intl.NumberFormat('de-DE', { maximumSignificantDigits: 3 }).format(parseInt(obj.total))

            }
            if (obj.status == 'proses') {
                var status_perbaikan = 'DALAM PROSES'
            } else if (obj.status == 'waiting sparepart'){
                var status_perbaikan = 'MENUNGGU SPAREPART'
            } else if (obj.status == 'finished'){
                var status_perbaikan = 'SELESAI'
            }else if (obj.status == 'cancelled'){
                var status_perbaikan = 'DIBATALKAN'
            }else if (obj.status == 'take'){
                var status_perbaikan = 'DIAMBIL'
            }
            if(obj.pickup_date == null){
                var pickup = '-'
            }else{
                var pickup = new Date(`${obj.pickup_date}`)
                pickup = pickup.getDate()+"-"+(pickup.getMonth()+1)+'-'+pickup.getFullYear()
            }
            if(obj.notes == null){
                var notes = '-'
            }else{
                var notes = obj.notes
            }
            if(teknisi == null){
                var tc = '-'
            }else{
                var tc = teknisi
            }
            if(optr == null){
                var operator = '-'
            }else{
                var operator = optr
            }

            $('#dtgl_servis').html(sv_dt.getDate()+"-"+(sv_dt.getMonth()+1)+'-'+sv_dt.getFullYear());
            $('#dnota').html(obj.transaction_code);
            $('#dcustomers').html(cust);
            $('#dtelephone').html(tlp);
            $('#dalamat').html(address);
            $('#dunit').html(obj.unit);
            $('#dpasscode').html(obj.passcode);
            $('#dcomplient').html(obj.complient);
            $('#dcompletenes').html(obj.completenes);
            $('#dtotal').html(total);
            $('#dstatus').html(status_perbaikan);
            $('#dnotes').html(notes);
            $('#dseri').html(obj.serial_number);
            $('#dtake').html(pickup);
            $('#dteknisi').html(tc);
            $('#doperator').html(operator);
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
            $('#t_total').val(parseInt(obj.total));
            $('#t_total_hidden').val(parseInt(obj.total));
            $('.takeUnit').modal('show');
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
            $('#estimated_cost').val(parseInt(obj.estimated_cost));
            $('.editStatusService').modal('show');
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
            $('#jasa_price').val(parseInt(obj.price));
            $('.bs-modal-lg-js').modal('hide');
            // $('#myModal').modal('show');
        }
    })
}
function ec_pilih_jasa_servis(e) {
    $.ajax({
        url: "/admin/servis/" + e + "/select_repaire",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            // alert()
            $('#ec_jasa_id').val(obj.id);
            $('#ec_jasa_name').val(obj.name);
            $('#ec_jasa_price').val(parseInt(obj.price));
            $('.ec_bs-modal-lg-js').modal('hide');
            // $('#myModal').modal('show');
        }
    })
}
function ec_pilih_sparepart_servis(e) {
    // var d = document.getElementById('discount_prod').value
    $.ajax({
        url: "/admin/stockopname/" + e + "/select_product",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#ec_id_product').val(obj.id);
            $('#ec_item_product').val(obj.name);
            $('#ec_item_price').val(parseInt(obj.selling_price));
            $('.ec_bs-modal-sparepart').modal('hide');
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
            $('#item_price').val(parseInt(obj.selling_price));
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

function ec_tambahJasaService(){
    var tbody_jasa = document.getElementById('ec_tbody_jasa_servis_op')
    var jasa_name = document.getElementById('ec_jasa_name').value
    var jasa_id = document.getElementById('ec_jasa_id').value
    var jasa_price = document.getElementById('ec_jasa_price').value

    tbody_jasa.innerHTML += `<tr>
    <td>${jasa_name}<input type="hidden" class="form-control" name="input_jasa_id[]" id="" value="${jasa_id}" readonly> <input type="hidden" class="form-control" name="input_jasa_name[]" id="" value="${jasa_name}" readonly> <input type="hidden" class="form-control" name="input_jasa_price[]" id="" value="${jasa_price}" readonly></td>
    <td>${jasa_price}</td>
    <td><button class="btn btn-sm btn-danger del-js"><i class="fas fa-trash del-js"></i></button></td></tr>`

    ec_changeTotalJasa()
    ec_TotalHargaService()
}

function ec_tambahSparepartService(){
    var tbody_sparepart = document.getElementById('ec_tbody_sparepart')
    var item_product = document.getElementById('ec_item_product').value
    var id_product = document.getElementById('ec_id_product').value
    var item_price = document.getElementById('ec_item_price').value
    var qty_prod = document.getElementById('ec_qty_prod').value
    var discount_prod = document.getElementById('ec_discount_prod').value

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

                ec_changeTotalSparepart()
                ec_TotalHargaService()
                ec_changeTotalDiscountSparepart()
            }

    }


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

            var h=(new Date()).getHours();
            var m=(new Date()).getMinutes();
            var s=(new Date()).getSeconds();
            if (h >= 4 && h < 10) var waktu = "Selamat pagi";
            if (h >= 10 && h < 15) waktu = "Siang";
            if (h >= 15 && h < 18) waktu = "Sore";
            if (h >= 18 || h < 4) waktu="Malam";

            if(d == 'finished'){
                var st = 'selesai'
            }else if(d == 'cancelled'){
                var st = 'dibatalkan'
            }

            var tgl = new Date().getTime()+(obj.batas.value*24*60*60*1000)
            var hariKedepan = new Date(tgl);
            var ok = hariKedepan.getMonth()
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli", "Agustus", "September", "Oktober", "November", "December"];
            // console.log(hariKedepan.getDate()+"-"+ok+"-"+hariKedepan.getFullYear())
            let batas_tanggal = hariKedepan.getDate()+" "+monthNames[ok]+" "+hariKedepan.getFullYear()


            const text = b.replace('{code}', c)
            const text1 = text.replace('{waktu}', waktu)
            const text2 = text1.replace('{status}', st)
            const text3 = text2.replace('{harga}', e)
            const text4 = text3.replace('{batas}', batas_tanggal)
            const text5 = text4.replace('{batas_type}', obj.batas_hari.value)

            const messages = sms.replace('{code}', c)
            const messages1 = messages.replace('{waktu}', waktu)
            const messages2 = messages1.replace('{status}', st)
            const messages3 = messages2.replace('{harga}', e)
            const messages4 = messages3.replace('{batas}', batas_tanggal)
            const messages5 = messages4.replace('{batas_type}', obj.batas_hari.value)

            el.innerHTML = `<div class="row">
            <div class="col-sm-4">
                <a href="whatsapp://send?text=${text5}&phone=+62${a}"><i class="fab fa-whatsapp-square fa-10x"></i></a>
            </div>
            <div class="col-sm-4">
                <a href="sms:+62${a}?body=${messages5}"><i class="fas fa-envelope-square fa-10x"></i></a>
            </div>
            <div class="col-sm-4">
                <a href="tel://+62${a}"><i class="fas fa-phone-square-alt fa-10x"></i></a>
            </div></div>`
        }
    })

}

function estimate_cost_choose(){
    let cost_estimated = document.getElementById('ec_sub_total').value

    document.getElementById('estimated_cost_total').value = cost_estimated

    $('.bs-estimasi-cost').modal('hide')
}

function create_cs_servis(){
    var telephone = document.getElementById('custelephone').value
    var name = document.getElementById('cusname').value
    var address = document.getElementById('cusaddress').value
    $.ajax({
        url: "/admin/servis/create_customer/"+telephone+'/'+name+'/'+address,
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




function ec_onDeleteJasaService(e) {
    if (!e.target.classList.contains('del-js')) {
        return;
    }
    // alert('click the button');
    const btn = e.target;
    btn.closest('tr').remove();

    ec_changeTotalJasa()
    ec_TotalHargaService()

}
function ec_onDeleteSparepart(e) {
    if (!e.target.classList.contains('del-spr')) {
        return;
    }
    // alert('click the button');
    const btn = e.target;
    btn.closest('tr').remove();

    // changeTotalJasa()
    ec_changeTotalSparepart()
    ec_TotalHargaService()
    ec_changeTotalDiscountSparepart()

}
var ec_table_sparepart = document.getElementById('ec_table_sparepart')
var ec_tableJasaService = document.getElementById('ec_jasa_servis_op')
ec_tableJasaService.addEventListener('click', ec_onDeleteJasaService);
ec_table_sparepart.addEventListener('click', ec_onDeleteSparepart);

function ec_changeTotalJasa() {
    ec_tableJasaService = document.getElementById('ec_jasa_servis_op')
    var sumHsl = 0;
    var subtot_jasa = document.getElementById("ec_subtot_jasa").value;
    for(var t = 1; t < ec_tableJasaService.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(ec_tableJasaService.rows[t].cells[1].innerHTML);
    }
    // console.log(sumHsl);
    document.getElementById("ec_subtot_jasa").value = sumHsl;
}
function ec_changeTotalSparepart() {
    table_sparepart = document.getElementById('ec_table_sparepart')
    var sumHsl = 0;

    for(var t = 1; t < table_sparepart.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(table_sparepart.rows[t].cells[4].innerHTML);
    }
    // console.log(sumHsl);
    document.getElementById("ec_subtot_prod").value = sumHsl;
}
function ec_changeTotalDiscountSparepart() {
    table_sparepart = document.getElementById('ec_table_sparepart')
    var sumHsl = 0;

    for(var t = 1; t < table_sparepart.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(table_sparepart.rows[t].cells[3].innerHTML);
    }
    // console.log(sumHsl);
    document.getElementById("ec_total_discount").value = sumHsl;
}

function ec_TotalHargaService(){
    var subtot_prod = document.getElementById('ec_subtot_prod').value
    var subtot_jasa = document.getElementById('ec_subtot_jasa').value
    var total = parseInt(subtot_prod) + parseInt(subtot_jasa)

    document.getElementById('ec_sub_total').value = total
}

function ct_print_sm(){
    $(window).on('load',function(){
        $('#modal_print_sm_check').modal('show');
    });
}
function ct_print_st(a){
    document.getElementById('buttonToPrint').innerHTML = `<div class="row"><div class="col-md-6"><a href="/admin/servis/print_take/${a}" style="width: 100%;" target="_blank" class="btn btn-primary btn-block">Termal</a></div><div class="col-md-6"><a href="/admin/servis/print_take_epson/${a}" style="width: 100%;"class="btn btn-secondary btn-block">Epson</a></div></div>`
    $(window).on('load',function(){
        $('#modal_print_sm_check').modal('show');
    });
}
function cekdiscounttakeunit(){
    var total = document.getElementById('t_total_hidden').value
    var discount = document.getElementById('t_discount').value
    var total_e = parseInt(total) - parseInt(discount)

    console.log(total_e)

    document.getElementById('t_total').value = total_e
}
