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
