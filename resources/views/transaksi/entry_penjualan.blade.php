@extends('template.layout')
@section('title', 'Penjualan')
@section('content')

<div class="card" onmousemove="changetsubtotal()">
    <div class="card-header bg-white">
        <div class="float-sm-end">
            <h6>Invoice <b>{{$invoice}}</b></h6>
        </div>
    </div>
    <div class="card-body">
    <h1 class="float-sm-start">Total (RP.)</h1>

    <div class="float-sm-end">
            <h1 id="subtot">0</h1>
        </div>
    </div>
</div>

<div class="row" >
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                    <div>
                        <label for="">Customer</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        <div>
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name_customer" id="name_customer" placeholder="" value="" required readonly>
                            @if ($errors->has('id_customer'))
                            <span class="text-danger">{{ $errors->first('id_customer') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Tipe</label>
                            <input type="text" class="form-control" name="type_customer" id="type_customer" placeholder="" value="" readonly>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <label for="">Barcode</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-product"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="" name="barcode" id="barcode" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                    <div>
                        <label for="">Barang</label>
                        <input type="text" class="form-control" name="name_product" id="name_product" placeholder="" value="" readonly>
                        <input type="hidden" class="form-control" name="id_product" id="id_product" placeholder="" value="" readonly>
                    </div>
                    <div>
                        <label for="">Harga</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="" value="" readonly>
                    </div>
                    <div>
                        <label for="">Qty</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="" required value="">
                    </div>
                    <button class="btn btn-success mt-3" onclick="inputStorage()"  type="button"><i class="dripicons-cart"></i> Tambah</button>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5>Data Barang</h5>
            </div>
            <div class="card-body">
                <form action="/admin/entry_penjualan/inputSale" method="post">
                    @csrf
                    <input type="hidden" class="form-control" name="id_customer" id="id_customer" placeholder="" value="" readonly>
                <div class="table-responsive">
                    <table class="table table-striped" name="sale_add_item" id="stocklimit" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="bodyTab">
                        </tbody>
                    </table>

                </div>
                <hr>
                <div>
                    <h4>Check Out</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Subtotal</label>
                            <input type="number" class="form-control" name="b_subtotal" id="b_subtotal" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Grand Total</label>
                            <input type="number" class="form-control" name="b_grandtotal" id="b_grandtotal" readonly>
                        </div>
                        <div>
                            <label for="">Diskon</label>
                            <input type="number" class="form-control" onkeyup="checkOutDis()" value="0" name="b_discount" id="b_discount" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">PPN</label>
                            <input type="number" class="form-control" value="0"  name="b_vat_tax" id="b_vat_tax" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">PPN ( % )</label>
                            <input type="number" class="form-control" onkeyup="ppn()" value="0" name="b_p_ppn" id="b_p_ppn">
                        </div>
                        <div>
                            <label>Payment Method</label>
                            <br>
                            <input type="radio" name="method" class="meth" value="cash" checked> <label for="">Cash</label>
                            <input type="radio" name="method" class="meth" value="credit"> <label for="">Credit</label>
                        </div>
                        <div id="form_duedate">
                            <label for="">Jatuh Tempo</label>
                            <input type="date" class="form-control" name="due_date" id="due_date">
                        </div>
                        <div>
                            <label for="">Bayar</label>
                            <input type="number" class="form-control" onkeyup="paymentCheck()" required  name="b_payment" id="b_payment">
                        </div>
                        <div>
                            <label for="">Kembalian</label>
                            <input type="number" class="form-control" name="b_cashback" id="b_cashback" readonly>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="mt-3">
                    <a href="#" onclick="cancelledSale()" class="btn btn-danger"><i class="fa fa-recycle m-right-xs""></i> Cancel</a>
                    <button type="submit" class="btn btn-primary" onclick="buyProduct()"><i class="fas fa-hand-holding-usd"></i> Payment</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Customer --}}
<div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Pilih Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="bestpelanggan" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Telephone</th>
                                <th>Name</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $item)
                            <tr>
                                <td>{{$item->telephone}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="select_entry_customer({{$item->id}})">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal Customer --}}
{{-- Modal Product --}}
<div class="modal fade bs-example-product" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Pilih Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="piutang" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <td>{{$item->barcode}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->selling_price}}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="select_entry_product({{$item->id}})">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal Product --}}
{{-- Modal Product --}}
<div class="modal fade editBarang" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">ُEdit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" id="a_name" class="form-control" readonly>
                            <input type="hidden" id="a_id" class="form-control" readonly>
                            <input type="hidden" id="a_idProduct" class="form-control" readonly>
                            <input type="hidden" id="a_barcode" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Harga</label>
                            <input type="text" id="a_price" class="form-control" readonly>
                        </div>
                        <div>
                            <label for="">Qty</label>
                            <input type="number" id="a_qty" onkeyup="editQtyBarang()" class="form-control">
                        </div>
                        <div>
                            <label for="">Total</label>
                            <input type="text" id="a_total" class="form-control" readonly>
                        </div>
                    </div><br>
                    <div>
                        <button type="button" onclick="updateData()" class="btn btn-sm btn-primary">Simpan</button>
                        <button type="button" onclick="closeModEdit()" class="btn btn-sm btn-secondary">Kembali</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal Product --}}


<script>

var table = document.querySelector('table')
var tbody = document.querySelector('tbody')


if (localStorage.saleData && localStorage.idData) {
    saleData = JSON.parse(localStorage.getItem('saleData'))


    for (let index = 0; index < saleData.length; index++) {
        // const element = array[index];

        tbody.innerHTML += `<tr>
                <td>${saleData[index].barcode}<input type="hidden" name="id_product[]" value="${saleData[index].id_product}" id="id_product"></td>
                <td>${saleData[index].name_product}</td>
                <td>${saleData[index].price}<input type="hidden" name="price[]" value="${saleData[index].price}" id="price"></td>
                <td>${saleData[index].quantity} <input type="hidden" name="quantity[]" value="${saleData[index].quantity}" id="quantity"></td>
                <td>${saleData[index].total}<input type="hidden" name="total[]" value="${saleData[index].total}" id="total"></td>
                <td><a href="#" onclick="editSale(${saleData[index].id})" class="btn btn-sm btn-primary mb-2"><i class="fas fa-pencil-alt"></i></a> <a href="#" onclick="removeSale(${saleData[index].id})" class="btn btn-sm btn-danger mb-2"><i class="fas fa-trash-alt"></i></a></td>
            </tr>`

    }
    changetsubtotal()

} else {
    console.log('Data Kosong/Errors')
}


    function inputStorage(){
        var barcode = document.getElementById('barcode').value
        var name_product = document.getElementById('name_product').value
        var id_product = document.getElementById('id_product').value
        var price = document.getElementById('price').value
        var quantity = document.getElementById('quantity').value
        var total = price * quantity;

        if(quantity == ""){
            alert('Quantity Harus Diisi!!');
        }else{

        if(localStorage.saleData && localStorage.idData){
            saleData = JSON.parse(localStorage.getItem('saleData'))
            idData = JSON.parse(localStorage.getItem('idData'))
        }else{
            var saleData = []
            var idData = 0
        }
        idData++

        saleData.push({
            id: idData,
            id_product: id_product,
            barcode: barcode,
            name_product: name_product,
            price: price,
            quantity: quantity,
            total: total
        })

        localStorage.setItem('saleData', JSON.stringify(saleData))
        localStorage.setItem('idData', idData)

        location.reload()


        }

    }

    function changetsubtotal(){
    var table = document.getElementById("stocklimit"), sumHsl = 0;
		for(var t = 1; t < table.rows.length; t++)
		{
			sumHsl = sumHsl + parseInt(table.rows[t].cells[4].innerHTML);
		}
        // console.log(sumHsl);
            document.getElementById("subtot").innerText = sumHsl;
            document.getElementById("b_subtotal").value = sumHsl;
            document.getElementById("b_grandtotal").value = sumHsl;
            document.getElementById('b_cashback').value = sumHsl;
    }

    function removeSale(a){
        if(localStorage.saleData && localStorage.idData){
            saleData = JSON.parse(localStorage.getItem('saleData'))

            idx_data = 0
            for (let index = 0; index < saleData.length; index++) {
                if(saleData[index].id == a){
                    saleData.splice(idx_data, 1)
                }
                idx_data++
            }

            localStorage.setItem('saleData', JSON.stringify(saleData))
            location.reload()

        }
    }

    function editSale(a){
        if (localStorage.saleData && localStorage.idData) {

        saleData = JSON.parse(localStorage.getItem('saleData'))
        console.log(saleData)

        idx_data = 0
        for(i in saleData){
            if(saleData[i].id == a){
                document.getElementById('a_id').value = saleData[i].id
                document.getElementById('a_idProduct').value = saleData[i].id_product
                document.getElementById('a_name').value = saleData[i].name_product
                document.getElementById('a_barcode').value = saleData[i].barcode
                document.getElementById('a_price').value = saleData[i].price
                document.getElementById('a_qty').value = saleData[i].quantity
                document.getElementById('a_total').value = saleData[i].total
                saleData.splice(idx_data, 1)
            }
            idx_data++
        }
        editBarang()
        return

        }
    }

    function updateData(){
    idData = document.getElementById('a_id').value
    id_product = document.getElementById('a_idProduct').value
    barcode = document.getElementById('a_barcode').value
    name_product = document.getElementById('a_name').value
    price = document.getElementById('a_price').value
    quantity = document.getElementById('a_qty').value
    total = document.getElementById('a_total').value

    saleData.push({
            id: idData,
            id_product: id_product,
            barcode: barcode,
            name_product: name_product,
            price: price,
            quantity: quantity,
            total: total
        })
    localStorage.setItem('saleData', JSON.stringify(saleData))

    location.reload()
}


    function editQtyBarang(){
        var a = document.getElementById('a_price').value;
        var b = document.getElementById('a_qty').value;

        var d = parseInt(a) * parseInt(b);

        document.getElementById('a_total').value = d;
    }

    function cancelledSale(){
        localStorage.clear()
        location.reload()
    }
</script>
@endsection
