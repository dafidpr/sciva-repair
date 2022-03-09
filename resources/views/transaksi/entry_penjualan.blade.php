@extends('template.layout')
@section('title', 'Penjualan')
@section('content')

    <div class="card" onmousemove="changetsubtotal()">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="float-sm-end">
                        <h6>Invoice <b>{{ $invoice }}</b></h6>
                    </div>
                </div>
            </div>
            <h1 class="float-sm-start">Total (RP.)</h1>

            <div class="float-sm-end">
                <h1 id="subtot">0</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <div>
                        <label for="">Customer</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal"
                                data-bs-target=".bs-example-modal-lg"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" placeholder=""
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        <div>
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name_customer" id="name_customer" placeholder=""
                                value="" required readonly>
                            @if ($errors->has('id_customer'))
                                <span class="text-danger">{{ $errors->first('id_customer') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Tipe</label>
                            <input type="text" class="form-control" name="type_customer" id="type_customer" placeholder=""
                                value="" readonly>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <label for="">Barcode</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1" onclick="addProduct()"><i
                                    class="fas fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="" name="barcode" id="barcode"
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                    <div>
                        <label for="">Barang</label>
                        <input type="text" class="form-control" name="name_product" id="name_product" placeholder=""
                            value="" readonly>
                        <input type="hidden" class="form-control" name="id_product" id="id_product" placeholder=""
                            value="" readonly>
                        <input type="hidden" class="form-control" name="discount" id="discount" placeholder="" value="0"
                            readonly>
                        <input type="hidden" class="form-control" name="hpp" id="hpp" placeholder="" value="0" readonly>
                    </div>
                    <div>
                        <label for="">Harga</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="" value=""
                            readonly>
                    </div>
                    <div>
                        <label for="">Qty</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="" required
                            value="">
                    </div>
                    <button class="btn btn-success mt-3" onclick="inputStorage()" type="button"><i
                            class="dripicons-cart"></i> Tambah</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Data Barang</h5>
                    <hr>
                    <form action="" method="post">
                        @csrf

                        <div class="table-responsive">
                            <table class="table table-striped" name="sale_add_item" id="stocklimit"
                                style="font-size: 13px;">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Qty</th>
                                        <th>total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTab">
                                </tbody>
                            </table>

                        </div>
                        <hr>


                        <div class="mt-3">
                            <a href="#" onclick="cancelledSale()" class="btn btn-danger"><i class="fa fa-recycle m-right-xs""></i> Cancel</a>
                            <button type="button" class="btn btn-primary" onclick="checkOut()"><i class="fas fa-hand-holding-usd"></i>Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Customer --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;"
        aria-hidden="true">
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
                                        <td>{{ $item->telephone }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary"
                                                onclick="select_entry_customer({{ $item->id }})">Pilih</button>
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
    <div class="modal fade bs-example-product" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;"
        aria-hidden="true">
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
                                    <th>Stok</th>
                                    <th>Limit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $item->barcode }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ number_format($item->selling_price) }}</td>
                                        <td>
                                            @if ($item->stock == $item->limit || $item->stock < $item->limit)
                                                <span class="btn btn-sm btn-danger">{{ $item->stock }}</span>
                                            @else
                                                <span class="btn btn-sm btn-success">{{ $item->stock }}</span>
                                            @endif
                                        </td>
                                        <td><span class="btn btn-sm btn-danger">{{ $item->limit }}</span></td>
                                        <td>
                                            <button @if ($item->stock == 0) disabled='disabled' @endif
                                                class="btn btn-sm btn-primary"
                                                onclick="select_entry_product({{ $item->id }})">Pilih</button>
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
    {{-- Modal edit Product --}}
    <div class="modal fade editBarang" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;"
        aria-hidden="true">
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
                                <input type="hidden" id="a_hpp" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Harga</label>
                                <input type="text" id="a_price" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Diskon</label>
                                <input type="text" id="a_discount" onkeyup="editDscBarang()" class="form-control">
                            </div>
                            <div class="col-md-6">
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
    {{-- End Modal edit Product --}}


    {{-- Modal Check Out --}}
    <div class="modal fade" id="modalCheckOut" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Check Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/entry_penjualan/inputSale" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>

                            <div>
                                <table>
                                    <tbody id="dataProductCheckOut"></tbody>
                                </table>

                            </div>
                            {{-- <h4>Check Out</h4> --}}
                            <input type="hidden" class="form-control" name="id_customer" id="id_customer" placeholder=""
                                value="" readonly>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Subtotal</label>
                                    <input type="number" class="form-control" name="b_subtotal" id="b_subtotal" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Grand Total</label>
                                    <input type="number" class="form-control" name="b_grandtotal" id="b_grandtotal"
                                        readonly>
                                </div>
                                <div>
                                    <label for="">Diskon</label>
                                    <input type="number" class="form-control" onkeyup="checkOutDis()" value="0"
                                        name="b_discount" id="b_discount" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">PPN</label>
                                    <input type="number" class="form-control" value="0" name="b_vat_tax" id="b_vat_tax"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">PPN ( % )</label>
                                    <input type="number" class="form-control" onkeyup="ppn()" value="0" name="b_p_ppn"
                                        id="b_p_ppn">
                                </div>
                                <div>
                                    <label>Payment Method</label>
                                    <br>
                                    <input type="radio" name="method" class="meth" value="cash" checked> <label
                                        for="">Cash</label>
                                    <input type="radio" name="method" class="meth" value="credit"> <label
                                        for="">Credit</label>
                                </div>
                                <div id="form_duedate">
                                    <label for="">Jatuh Tempo</label>
                                    <input type="date" class="form-control" name="due_date" id="due_date">
                                </div>
                                <div>
                                    <label for="">Bayar</label>
                                    <input type="number" class="form-control" onkeyup="paymentCheck()" required
                                        name="b_payment" id="b_payment">
                                </div>
                                <div>
                                    <label for="">Kembalian</label>
                                    <input type="number" class="form-control" name="b_cashback" id="b_cashback" readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick="cancelledSale()" class="btn btn-primary">Payment</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- End Modal Check Out --}}

    {{-- Modal Check Out --}}
    <div id="modal_print_check" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Cetak Print</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="font-size-16 text-center">Pilih Untuk Cetak Print!!</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/admin/daftar_penjualan/cetak/{{ old('print_s_penjualan') }}" style="width: 100%;"
                                target="_blank" class="btn btn-primary btn-block">Thermal</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" style="width: 100%;" onclick="print_frime({{old('print_s_penjualan')}})" class="btn btn-secondary btn-block">Epson</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div>







    {{-- window.open("/admin/daftar_penjualan/cetak/"+<?php echo old('print_s_penjualan'); ?>, '_blank'); --}}



    <script>
        const table = document.querySelector('table')
        var tbody = document.querySelector('tbody')
        var dataCheck = document.getElementById('dataProductCheckOut')


        if (localStorage.saleData && localStorage.idData) {
            saleData = JSON.parse(localStorage.getItem('saleData'))


            for (let index = 0; index < saleData.length; index++) {
                // const element = array[index];

                tbody.innerHTML += `<tr>
                <td>${saleData[index].barcode}<input type="hidden" name="id_product[]" value="${saleData[index].id_product}" id="id_product"></td>
                <td>${saleData[index].name_product}</td>
                <td>${saleData[index].price}<input type="hidden" name="price[]" value="${saleData[index].price}" id="price"></td>
                <td>${saleData[index].discount}<input type="hidden" name="discount[]" value="${saleData[index].discount}" id="discount"></td>
                <td>${saleData[index].quantity} <input type="hidden" name="quantity[]" value="${saleData[index].quantity}" id="quantity"><input type="hidden" name="hpp[]" value="${saleData[index].hpp}" id="quantity"></td>
                <td>${saleData[index].total}<input type="hidden" name="total[]" value="${saleData[index].total}" id="total"></td>
                <td><a href="#" onclick="editSale(${saleData[index].id})" class="btn btn-sm btn-primary mb-2"><i class="fas fa-pencil-alt"></i> </a> <button type="button" onclick="removeSale(${saleData[index].id})" class="btn btn-sm btn-danger mb-2 del_sale_y"><i class="fas fa-trash-alt del_sale_y"></i></button></td>
            </tr>`

            }
            changetsubtotal()

        } else {
            console.log('.')
        }


        function inputStorage() {
            var barcode = document.getElementById('barcode').value
            var name_product = document.getElementById('name_product').value
            var id_product = document.getElementById('id_product').value
            var price = document.getElementById('price').value
            var discount = document.getElementById('discount').value
            var quantity = document.getElementById('quantity').value
            var hpp = document.getElementById('hpp').value
            var total = price * quantity;

            if (quantity == "") {
                alert('Quantity Harus Diisi!!');
            } else {

                if (localStorage.saleData && localStorage.idData) {
                    saleData = JSON.parse(localStorage.getItem('saleData'))
                    idData = JSON.parse(localStorage.getItem('idData'))
                } else {
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
                    hpp: hpp,
                    discount: discount,
                    quantity: quantity,
                    total: total
                })

                localStorage.setItem('saleData', JSON.stringify(saleData))
                localStorage.setItem('idData', idData)

                tbody.innerHTML += `<tr>
            <td>${barcode}<input type="hidden" name="id_product[]" value="${id_product}" id="id_product"></td>
            <td>${name_product}</td>
            <td>${price}<input type="hidden" name="price[]" value="${price}" id="price"></td>
            <td>${discount}<input type="hidden" name="discount[]" value="${discount}" id="discount"><input type="hidden" name="hpp[]" value="${hpp}" id="quantity"></td>
            <td>${quantity} <input type="hidden" name="quantity[]" value="${quantity}" id="quantity"></td>
            <td>${total}<input type="hidden" name="total[]" value="${total}" id="total"></td>
            <td><a href="#" onclick="editSale(${idData})" class="btn btn-sm btn-primary mb-2"><i class="fas fa-pencil-alt"></i></a> <button type="button" onclick="removeSale(${idData})" class="btn btn-sm btn-danger mb-2 del_sale_y"><i class="fas fa-trash-alt del_sale_y"></i></button></td>
            </tr>`

            }

            changetsubtotal()

        }

        function changetsubtotal() {
            var table = document.getElementById("stocklimit"),
                sumHsl = 0,
                sumHs2 = 0;
            for (var t = 1; t < table.rows.length; t++) {
                sumHsl = sumHsl + parseInt(table.rows[t].cells[5].innerHTML);
                sumHs2 = sumHs2 + parseInt(table.rows[t].cells[3].innerHTML);
            }
            // console.log(sumHsl);
            document.getElementById("subtot").innerText = new Intl.NumberFormat().format(sumHsl);
            document.getElementById("b_subtotal").value = sumHsl;
            document.getElementById("b_grandtotal").value = sumHsl;
            document.getElementById('b_cashback').value = sumHsl;
            document.getElementById('b_discount').value = sumHs2;
        }

        function removeSale(a, e) {
            if (localStorage.saleData && localStorage.idData) {
                saleData = JSON.parse(localStorage.getItem('saleData'))

                idx_data = 0
                for (let index = 0; index < saleData.length; index++) {
                    if (saleData[index].id == a) {
                        saleData.splice(idx_data, 1)
                    }
                    idx_data++
                }

                localStorage.setItem('saleData', JSON.stringify(saleData))
                // location.reload()


            }
        }

        table.addEventListener('click', onDelete);

        function onDelete(e) {
            if (!e.target.classList.contains('del_sale_y')) {
                return;
            }
            // alert('click the button');
            const btn = e.target;
            btn.closest('tr').remove();
            changetsubtotal()

        }

        var tb = document.getElementById('stocklimit'),
            rindex;

        function editSale(a) {
            if (localStorage.saleData && localStorage.idData) {

                saleData = JSON.parse(localStorage.getItem('saleData'))
                console.log(saleData)

                idx_data = 0
                for (i in saleData) {
                    if (saleData[i].id == a) {
                        document.getElementById('a_id').value = saleData[i].id
                        document.getElementById('a_idProduct').value = saleData[i].id_product
                        document.getElementById('a_name').value = saleData[i].name_product
                        document.getElementById('a_barcode').value = saleData[i].barcode
                        document.getElementById('a_price').value = saleData[i].price
                        document.getElementById('a_discount').value = saleData[i].discount
                        document.getElementById('a_hpp').value = saleData[i].hpp
                        document.getElementById('a_qty').value = saleData[i].quantity
                        document.getElementById('a_total').value = saleData[i].total
                        saleData.splice(idx_data, 1)
                    }
                    idx_data++
                }
                editBarang()

                for (let index = 1; index < tb.rows.length; index++) {
                    tb.rows[index].onclick = function() {
                        rIndex = this.rowIndex;
                        console.log(rIndex);

                    }

                }

                return

            }
        }

        function updateData() {
            idData = document.getElementById('a_id').value
            id_product = document.getElementById('a_idProduct').value
            barcode = document.getElementById('a_barcode').value
            name_product = document.getElementById('a_name').value
            price = document.getElementById('a_price').value
            discount = document.getElementById('a_discount').value
            quantity = document.getElementById('a_qty').value
            total = document.getElementById('a_total').value
            hpp = document.getElementById('a_hpp').value

            saleData.push({
                id: idData,
                id_product: id_product,
                barcode: barcode,
                name_product: name_product,
                price: price,
                hpp: hpp,
                discount: discount,
                quantity: quantity,
                total: total
            })
            localStorage.setItem('saleData', JSON.stringify(saleData))

            // location.reload()
            if (name_product != '') {
                tbody.innerHTML = ''
            }
            closeModEdit()
            re_load()

        }

        // function updateInCol(){
        //     tb.rows[rIndex].cells[0].innerHTML = document.getElementById('name').value;
        //     tb.rows[rIndex].cells[1].innerHTML = document.getElementById('kelas').value;
        //     tb.rows[rIndex].cells[1].innerHTML = document.getElementById('kelas').value;
        //     tb.rows[rIndex].cells[2].innerHTML = document.getElementById('kelas').value;
        //     tb.rows[rIndex].cells[3].innerHTML = document.getElementById('kelas').value;
        // }


        function editQtyBarang() {
            var a = document.getElementById('a_price').value;
            var b = document.getElementById('a_qty').value;

            var d = parseInt(a) * parseInt(b);

            document.getElementById('a_total').value = d;
        }

        function editDscBarang() {
            var a = document.getElementById('a_price').value;
            var b = document.getElementById('a_discount').value;
            var g = document.getElementById('a_qty').value;

            var d = parseInt(a) * parseInt(g) - parseInt(b);

            document.getElementById('a_total').value = d;
        }

        function cancelledSale() {
            localStorage.clear();
            location.reload()
        }

        function re_load() {
            if (localStorage.saleData && localStorage.idData) {
                saleData = JSON.parse(localStorage.getItem('saleData'))


                for (let index = 0; index < saleData.length; index++) {
                    // const element = array[index];

                    tbody.innerHTML += `<tr>
                <td>${saleData[index].barcode}<input type="hidden" name="id_product[]" value="${saleData[index].id_product}" id="id_product"></td>
                <td>${saleData[index].name_product}</td>
                <td>${saleData[index].price}<input type="hidden" name="price[]" value="${saleData[index].price}" id="price"></td>
                <td>${saleData[index].discount}<input type="hidden" name="discount[]" value="${saleData[index].discount}" id="discount"></td>
                <td>${saleData[index].quantity} <input type="hidden" name="quantity[]" value="${saleData[index].quantity}" id="quantity"><input type="hidden" name="hpp[]" value="${saleData[index].hpp}" id="hpp"></td>
                <td>${saleData[index].total}<input type="hidden" name="total[]" value="${saleData[index].total}" id="total"></td>
                <td><a href="#" onclick="editSale(${saleData[index].id})" class="btn btn-sm btn-primary mb-2"><i class="fas fa-pencil-alt"></i> </a> <button type="button" onclick="removeSale(${saleData[index].id})" class="btn btn-sm btn-danger mb-2 del_sale_y"><i class="fas fa-trash-alt del_sale_y"></i></button></td>
            </tr>`

                }
                changetsubtotal()



            } else {
                console.log('Data Kosong/Errors')
            }
        }
    </script>

@endsection
@section('c_print')
    @if (old('print_s_penjualan'))
        <script>
            // $('#modal_print_check').modal('show');
            check_print();
        </script>
        <div id="toPrint"></div>

    @endif

@endsection
