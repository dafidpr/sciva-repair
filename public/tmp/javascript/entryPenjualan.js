function select_entry_customer(e){
    $.ajax({
        url: "/admin/servis/" + e + "/select_customer",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id_customer').val(obj.id);
            $('#name_customer').val(obj.name);
            $('#type_customer').val(obj.type);
            $('.bs-example-modal-lg').modal('hide');
        }
    })
}
function select_entry_product(e){
    var t = $('#type_customer').val();
    if(t === 'member'){
        $.ajax({
            url: "/admin/stockopname/" + e + "/select_product",
            type: "get",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#id_product').val(obj.id);
                $('#name_product').val(obj.name);
                $('#barcode').val(obj.barcode);
                $('#hpp').val(obj.purchase_price);
                $('#price').val(parseInt(obj.member_price));
                $('.bs-example-product').modal('hide');
            }
        })
    }else{
        $.ajax({
            url: "/admin/stockopname/" + e + "/select_product",
            type: "get",
            success: function(data) {
                var obj = JSON.parse(data);
                $('#id_product').val(obj.id);
                $('#name_product').val(obj.name);
                $('#barcode').val(obj.barcode);
                $('#hpp').val(obj.purchase_price);
                $('#price').val(parseInt(obj.selling_price));
                $('.bs-example-product').modal('hide');
            }
        })
    }
}




var dtable = document.getElementById('stocklimit'),rIndex;

function editBarang(){
    $('.editBarang').modal('show');
}
function addProduct(){
    var cs = document.getElementById('name_customer').value
    if(cs == ''){
        alert('Data Customer harus diisi!!')
    }else{

        $('.bs-example-product').modal('show');
    }
}
function closeModEdit(){

    $('.editBarang').modal('hide');

}

function ppn(){
    var ppn = document.getElementById('b_p_ppn').value;
    var subtotal = document.getElementById('b_subtotal').value;

    var h_ppn = subtotal * ppn / 100;

    if(!isNaN(ppn)){
        var a = document.getElementById('b_vat_tax').value = h_ppn;
        var c = parseInt(subtotal)+parseInt(a);
        document.getElementById('b_grandtotal').value = c;
        document.getElementById("subtot").innerText = c;
        document.getElementById('b_cashback').value = c;

    }else{
        document.getElementById('b_vat_tax').value = 0;
        document.getElementById('b_grandtotal').value = 0;

    }

}


$(document).ready(function(){
    $("#form_duedate").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
        $(".meth").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
        if ($("input[name='method']:checked").val() == "credit" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
            $("#form_duedate").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
        } else {
            $("#form_duedate").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
        }
    });
});

function paymentCheck(){
    var grandtotal = document.getElementById('b_grandtotal').value
    var payment = document.getElementById('b_payment').value
    var finallyTotal = parseInt(payment) - parseInt(grandtotal)


    if(!isNaN(finallyTotal)){

        document.getElementById('b_cashback').value = finallyTotal
    }else{
        changetsubtotal()

    }
}

    function checkOut(){
        var tb = document.getElementById('dataProductCheckOut')
        var customer = document.getElementById('id_customer').value

        if(customer == ''){
            alert('Customer tidak boleh kosong!!');

        }else{
            if(customer != ''){
                tb.innerHTML = ''
            }
            if (localStorage.saleData && localStorage.idData) {
                saleData = JSON.parse(localStorage.getItem('saleData'))


                for (let index = 0; index < saleData.length; index++) {
                    // const element = array[index];

                    tb.innerHTML += `<tr>
                            <td><input type="hidden" name="id_product[]" value="${saleData[index].id_product}" id="id_product"></td>
                            <td><input type="hidden" name="price[]" value="${parseInt(saleData[index].price)}" id="price"></td>
                            <td><input type="hidden" name="discount[]" value="${parseInt(saleData[index].discount)}" id="discount"></td>
                            <td><input type="hidden" name="quantity[]" value="${saleData[index].quantity}" id="quantity"><input type="hidden" name="hpp[]" value="${saleData[index].hpp}" id="hpp"></td>
                            <td><input type="hidden" name="total[]" value="${saleData[index].total}" id="total"></td>
                        </tr>`

                }
                // changetsubtotal()

            } else {
                console.log('Data Kosong/Errors')
            }
            $('#modalCheckOut').modal('show');
        }



    }

    function modalCheckClose(){

        $('#modalCheckOut').modal('hide');
    }

    function check_print(){
        // $('#modal_print_check').modal('show');
        $(window).on('load',function(){
            $('#modal_print_check').modal('show');
        });
    }

    function print_penjualan_choose(id){
        document.getElementById('choose_print').innerHTML = `<div class="col-md-6">
        <a href="/admin/daftar_penjualan/cetak/${id}" style="width: 100%;" target="_blank" class="btn btn-primary btn-block">Thermal</a>
    </div>
    <div class="col-md-6">
        <a href="/admin/daftar_penjualan/cetak_epson/${id}" style="width: 100%;"class="btn btn-secondary btn-block">Epson</a>
    </div>`
        $('#modal_print_check').modal('show');
    }
