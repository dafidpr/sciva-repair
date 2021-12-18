function selectProductGenerete(e) {
    $.ajax({
        url: "/admin/stockopname/" + e + "/select_product",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id_product').val(obj.id);
            $('#barcode').val(obj.barcode);
            $('#name_product').val(obj.name);
        }
    })
}

function modalCetakBr(){
    var barcode = document.getElementById('barcode').value
    var name_product = document.getElementById('name_product').value
    var id_product = document.getElementById('id_product').value

    document.getElementById('i_barcode').value = barcode
    document.getElementById('i_name_product').value = name_product
    document.getElementById('i_id_product').value = id_product

    $('#modalCetakBr').modal('show');
}


function generateBr(){
    var barcode = document.getElementById('barcode').value
    var name_product = document.getElementById('name_product').value
    var id_product = document.getElementById('id_product').value
    var a = document.getElementById('viewBarcode')

    $.ajax({
        url: "/admin/generatebarcode/generate/" + barcode,
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            // $('#id_product').val(obj.id);
            // $('#barcode').val(obj.barcode);
            // $('#name_product').val(obj.name);
            a.innerHTML = obj
        }
    })


}
