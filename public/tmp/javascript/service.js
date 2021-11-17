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
