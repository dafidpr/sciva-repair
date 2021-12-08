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
                $('#price').val(obj.member_price);
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
                $('#price').val(obj.selling_price);
                $('.bs-example-product').modal('hide');
            }
        })
    }
}




var dtable = document.getElementById('stocklimit'),rIndex;

function editBarang(){
    $('.editBarang').modal('show');
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
