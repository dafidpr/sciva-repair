var tbody = document.querySelector('tbody')

if (localStorage.data_purchase && localStorage.id_data) {
    data_purchase = JSON.parse(localStorage.getItem('data_purchase'))


    for (let index = 0; index < data_purchase.length; index++) {
        // const element = array[index];

        tbody.innerHTML += `<tr>
                <td>${data_purchase[index].barcode} <input type="hidden" name="i_id_product[]" value="${data_purchase[index].id_product}" class="form-control"></td>
                <td>${data_purchase[index].name_product} </td>
                <td>${data_purchase[index].purchase_price} <input type="hidden" name="i_purchase_price[]" value="${data_purchase[index].purchase_price}" class="form-control"></td>
                <td>${data_purchase[index].sale_price} <input type="hidden" name="i_sale_price[]" value="${data_purchase[index].sale_price}" class="form-control"></td>
                <td>${data_purchase[index].quantity_product} <input type="hidden" name="i_quantity[]" value="${data_purchase[index].quantity_product}" class="form-control"></td>
                <td>${data_purchase[index].total}
                <input type="hidden" name="i_total[]" id="i_total" value="${data_purchase[index].total}" class="form-control">
                </td>
                <td><button class="btn btn-sm btn-primary" type='button' data-bs-toggle="modal" data-bs-target="#editProduct" onclick="editPurchase(${data_purchase[index].id})"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-sm btn-danger del_pur_y" type='button' onclick="removePurchase(${data_purchase[index].id})"><i class="fas fa-trash-alt del_pur_y"></i></button></td>
            </tr>`

    }
    changeTotal()
} else {
    console.log('Data Kosong/Errors')
}

function supplierForPurchase(e) {
    $.ajax({
        url: "/admin/daftar_pembelian/" + e + "/select_supplier",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id_supplier').val(obj.id);
            $('#name_supplier').val(obj.name);
            $('.bs-example-modal-lg').modal('hide');
            // $('#myModal').modal('show');
        }
    })
}

function productForPurchase(e) {
    $.ajax({
        url: "/admin/stockopname/" + e + "/select_product",
        type: "get",
        success: function(data) {
            var obj = JSON.parse(data);
            $('#id_product').val(obj.id);
            $('#barcode').val(obj.barcode);
            $('#name_product').val(obj.name);
            $('#purchase_price').val(obj.purchase_price);
            $('#sale_price').val(obj.selling_price);
            $('.bs-modal-product').modal('hide');
            // $('#myModal').modal('show');
        }
    })
}

function inputPurchase(){
    var id_product = document.getElementById('id_product')
    var id_supplier = document.getElementById('id_supplier')
    var name_supplier = document.getElementById('name_supplier')
    var barcode = document.getElementById('barcode')
    var quantity_product = document.getElementById('quantity_product')
    var purchase_price = document.getElementById('purchase_price')
    var sale_price = document.getElementById('sale_price')
    var bonus = document.getElementById('bonus')

    if(quantity_product.value == ""){
        alert('Quantity Tidak boleh kosong!!');
    }else{

    if(localStorage.data_purchase && localStorage.id_data){
        data_purchase = JSON.parse(localStorage.getItem('data_purchase'))
        id_data = JSON.parse(localStorage.getItem('id_data'))
    }else{

        var data_purchase = []
        var id_data = 0
    }

    var total = purchase_price.value * quantity_product.value

    //Menjadikan satu data

    id_data++

    data_purchase.push({
        id: id_data,
        id_product:id_product.value,
        name_product:name_product.value,
        barcode:barcode.value,
        quantity_product:quantity_product.value,
        purchase_price:purchase_price.value,
        sale_price:sale_price.value,
        total:total,
    })

    localStorage.setItem('data_purchase', JSON.stringify(data_purchase))
    localStorage.setItem('id_data', id_data)

    tbody.innerHTML += `<tr>
                <td>${barcode.value} <input type="hidden" name="i_id_product[]" value="${id_product.value}" class="form-control"></td>
                <td>${name_product.value} </td>
                <td>${purchase_price.value} <input type="hidden" name="i_purchase_price[]" value="${purchase_price.value}" class="form-control"></td>
                <td>${sale_price.value} <input type="hidden" name="i_sale_price[]" value="${sale_price.value}" class="form-control"></td>
                <td>${quantity_product.value} <input type="hidden" name="i_quantity[]" value="${quantity_product.value}" class="form-control"></td>
                <td>${total}
                <input type="hidden" name="i_total[]" id="i_total" value="${total}" class="form-control">
                </td>
                <td><button class="btn btn-sm btn-primary" type='button' data-bs-toggle="modal" data-bs-target="#editProduct" onclick="editPurchase(${id_data})"><i class="fas fa-pencil-alt"></i> </button> <button class="btn btn-sm btn-danger del_pur_y" type='button' onclick="removePurchase(${id_data})"><i class="fas fa-trash-alt del_pur_y"></i> </button></td>
            </tr>`
    // location.reload()
    changeTotal()


    }
}

function removePurchase(a){
    if (localStorage.data_purchase && localStorage.id_data) {
        data_purchase = JSON.parse(localStorage.getItem('data_purchase'))

        idx_data = 0
        for (i in data_purchase) {
            if (data_purchase[i].id == a) {
                data_purchase.splice(idx_data, 1)
            }
            idx_data++
        }

        localStorage.setItem('data_purchase', JSON.stringify(data_purchase))
        // location.reload()
    }
}
// var table = document.getElementById('stocklimit')
const table = document.querySelector('table')
function onDelete(e){
    if(!e.target.classList.contains('del_pur_y')){
        return;
    }
    // alert('click the button');
    const btn = e.target;
    btn.closest('tr').remove();
    changeTotal()

}
table.addEventListener('click', onDelete);

function editPurchase(a){
    if (localStorage.data_purchase && localStorage.id_data) {

        data_purchase = JSON.parse(localStorage.getItem('data_purchase'))

        idx_data = 0
        for(i in data_purchase){
            if(data_purchase[i].id == a){
                document.getElementById('e_id_product').value = data_purchase[i].id_product
                document.getElementById('e_id').value = data_purchase[i].id
                document.getElementById('e_barcode').value = data_purchase[i].barcode
                document.getElementById('e_name_product').value = data_purchase[i].name_product
                document.getElementById('e_quantity_product').value = data_purchase[i].quantity_product
                document.getElementById('e_purchase_price').value = data_purchase[i].purchase_price
                document.getElementById('e_sale_price').value = data_purchase[i].sale_price
                document.getElementById('e_total').value = data_purchase[i].total
                data_purchase.splice(idx_data, 1)
            }
            idx_data++
        }
        return

    }
}

function updatePurchase(){
    var barcode = document.getElementById('e_barcode').value
    var id = document.getElementById('e_id').value
    var id_product = document.getElementById('e_id_product').value
    var name_product = document.getElementById('e_name_product').value
    var quantity = document.getElementById('e_quantity_product').value
    var purchase_price = document.getElementById('e_purchase_price').value
    var sale_price = document.getElementById('e_sale_price').value
    var total = document.getElementById('e_total').value

    var hasil = purchase_price * quantity

    data_purchase.push({
        id: id,
        id_product: id_product,
        name_product:name_product,
        barcode:barcode,
        quantity_product:quantity,
        purchase_price:purchase_price,
        sale_price:sale_price,
        total:hasil,
    })
    localStorage.setItem('data_purchase', JSON.stringify(data_purchase))

    $('#editProduct').modal('hide')
    re_loadPurchase()
}

function changeTotal() {
    var table = document.querySelector("table"), sumHsl = 0;
    var i_total = document.getElementById("i_total");
    for(var t = 1; t < table.rows.length; t++)
    {
        sumHsl = sumHsl + parseInt(table.rows[t].cells[5].innerHTML);
    }
    // console.log(sumHsl);
        document.getElementById("subtot").innerText = sumHsl;
        document.getElementById("i_grandtotal").value = sumHsl;
}

function purchase_cashback(){
    var grandtotal = document.getElementById('i_grandtotal').value
    var payment = document.getElementById('i_payment').value
    var finallyTotal = payment - grandtotal


    if(!isNaN(finallyTotal)){

        document.getElementById('cashback').value = finallyTotal
    }else{
        document.getElementById('cashback').value = 0
        // changetsubtotal()

    }
}


function re_loadPurchase(){
    var a = $('#i_grandtotal').val
    if(a == ''){
        tbody.innerHTML = ''
    }else{
        tbody.innerHTML = ''
    }

    if (localStorage.data_purchase && localStorage.id_data) {
        data_purchase = JSON.parse(localStorage.getItem('data_purchase'))


        for (let index = 0; index < data_purchase.length; index++) {
            // const element = array[index];

            tbody.innerHTML += `<tr>
                    <td>${data_purchase[index].barcode} <input type="hidden" name="i_id_product[]" value="${data_purchase[index].id_product}" class="form-control"></td>
                    <td>${data_purchase[index].name_product} </td>
                    <td>${data_purchase[index].purchase_price} <input type="hidden" name="i_purchase_price[]" value="${data_purchase[index].purchase_price}" class="form-control"></td>
                    <td>${data_purchase[index].sale_price} <input type="hidden" name="i_sale_price[]" value="${data_purchase[index].sale_price}" class="form-control"></td>
                    <td>${data_purchase[index].quantity_product} <input type="hidden" name="i_quantity[]" value="${data_purchase[index].quantity_product}" class="form-control"></td>
                    <td>${data_purchase[index].total}
                    <input type="hidden" name="i_total[]" id="i_total" value="${data_purchase[index].total}" class="form-control">
                    </td>
                    <td><button class="btn btn-sm btn-primary" type='button' data-bs-toggle="modal" data-bs-target="#editProduct" onclick="editPurchase(${data_purchase[index].id})"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-sm btn-danger del_pur_y" type='button' onclick="removePurchase(${data_purchase[index].id})"><i class="fas fa-trash-alt del_pur_y"></i></button></td>
                </tr>`

        }
        changeTotal()
    } else {
        console.log('Data Kosong/Errors')
    }
}

function checkOutPurchase(){

    var tb = document.getElementById('dataPurchaseCheckOut')
    var spl = document.getElementById('id_supplier').value
    // var tb = document.getElementById('dataPurchaseCheckOut')
    if(spl == ''){
        alert('Data Supplier tidak boleh kosong!!');
    }

    tb.innerHTML = ''

    if (localStorage.data_purchase && localStorage.id_data) {
        data_purchase = JSON.parse(localStorage.getItem('data_purchase'))


        for (let index = 0; index < data_purchase.length; index++) {
            // const element = array[index];

            tb.innerHTML += `<tr>
                    <td>${data_purchase[index].barcode} <input type="hidden" name="i_id_product[]" value="${data_purchase[index].id_product}" class="form-control"></td>
                    <td>${data_purchase[index].name_product} </td>
                    <td>${data_purchase[index].purchase_price} <input type="hidden" name="i_purchase_price[]" value="${data_purchase[index].purchase_price}" class="form-control"></td>
                    <td>${data_purchase[index].sale_price} <input type="hidden" name="i_sale_price[]" value="${data_purchase[index].sale_price}" class="form-control"></td>
                    <td>${data_purchase[index].quantity_product} <input type="hidden" name="i_quantity[]" value="${data_purchase[index].quantity_product}" class="form-control"></td>
                    <td>${data_purchase[index].total}
                    <input type="hidden" name="i_total[]" id="i_total" value="${data_purchase[index].total}" class="form-control">
                    </td>
                    <td><button class="btn btn-sm btn-primary" type='button' data-bs-toggle="modal" data-bs-target="#editProduct" onclick="editPurchase(${data_purchase[index].id})"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-sm btn-danger del_pur_y" type='button' onclick="removePurchase(${data_purchase[index].id})"><i class="fas fa-trash-alt del_pur_y"></i></button></td>
                </tr>`

        }
        $('#modalCheckOutPurchase').modal('show')
        changeTotal()
    } else {
        alert('Data Barang Kosong!!')
        console.log('Data Kosong/Errors')
    }
}

function cancelledPurchase(){
    localStorage.clear()
    location.reload()
}
