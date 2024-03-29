@extends('template.layout')
@section('title', 'Pembelian')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="float-sm-end">
                    <h6>Invoice <b>{{$id}}</b></h6>
                </div>
            </div>
        </div>
    <h1 class="float-sm-start" >Total (RP.)</h1>

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
                        <label for="">Supplier</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" id="name_supplier" name="name_supplier" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        @if ($errors->has('id_supplier'))
                        <span class="text-danger">{{ $errors->first('id_supplier') }}</span>
                        @endif
                    </div>
                    <hr>
                    <div>
                        <label for="">Barcode</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-modal-product"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" name="barcode" id="barcode" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                    <div>
                        <label for="">Barang</label>
                            <input type="text" name="barang" id="name_product" class="form-control" placeholder="" aria-label="Example text with button addon" value="" readonly>
                    </div>
                    <div>
                        <label for="">Qty</label>
                            <input type="number" class="form-control" id="quantity_product" placeholder="" aria-label="Example text with button addon" value="">
                    </div>
                    <div>
                        <label for="">Harga Beli</label>
                            <input type="text" id="purchase_price" class="form-control" placeholder="" aria-label="Example text with button addon" value="">
                            <input type="hidden" id="id_product" class="form-control" placeholder="" aria-label="Example text with button addon" value="">
                    </div>
                    <div>
                        <label for="">Harga Jual</label>
                            <input type="text" id="sale_price" class="form-control" placeholder="" aria-label="Example text with button addon" value="">
                    </div>
                    <div>
                    </div>
                        <a href="#" class="btn btn-success mt-3" onclick="inputPurchase()"><i class="dripicons-cart"></i> Tambah</a>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Barang</h5>
                        <hr>
                        @if (session('berhasil'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                            </button>
                            <strong>Selamat</strong> {{session('berhasil')}}.
                        </div>
                        @endif
                        @if (session('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                            </button>
                            <strong>Maaf</strong> {{session('gagal')}}.
                        </div>
                        @endif
                <form action="#" method="post" enctype="multipart/form-data">
                @csrf

                <div class="table-responsive">
                    <table class="table table-striped" id="stocklimit" width="100%" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th width="20%">Harga Beli</th>
                                <th width="20%">Harga Jual</th>
                                <th>Qty</th>
                                <th width="18%">Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
                <hr>


                <div class="mt-3">
                    <a href="#" onclick="cancelledPurchase()" class="btn btn-danger"><i class="fa fa-recycle m-right-xs""></i> Cancel</a>
                    <button type="button" onclick="checkOutPurchase()" class="btn btn-primary"><i class="fas fa-hand-holding-usd"></i> Payment</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

{{-- Modal Supplier --}}
<div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Pilih Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" width="100%" id="pilihjasa" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Telephone</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplier as $item)
                            <tr>
                                <td>{{$item->supplier_code}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->telephone}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <a href="#" onclick="supplierForPurchase({{$item->id}})" class="btn btn-sm btn-primary">Pilih</a>
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
{{-- End Modal Supplier --}}
{{-- Modal Product --}}
<div class="modal fade bs-modal-product" tabindex="-1" id="pilihbarang" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                {{-- <h4 class="text-center">Pilih Barang</h4><br> --}}
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarang"><i class="fas fa-plus"></i> Tambah Barang</button>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" style="width: 100%; font-size:13px;" id="piutang">
                        <thead>
                            <tr>
                                <td>Barcode</td>
                                <td>Nama</td>
                                <td>Stock</td>
                                <td>Harga</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <td>{{$item->barcode}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->stock}}</td>
                                <td>{{number_format($item->purchase_price)}}</td>
                                <td>
                                    <button type="button" onclick="productForPurchase({{$item->id}})" class="btn btn-sm btn-primary"><i class="far fa-check-square"></i> Pilih</button>
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

{{-- Edit Modal --}}
<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Edit product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div>
                        <label for="">Barcode</label>
                        <input type="text" id="e_barcode" class="form-control" readonly>
                        <input type="hidden" id="e_id_product" class="form-control">
                        <input type="hidden" id="e_id" class="form-control">
                    </div>
                    <div>
                        <label for="">Nama</label>
                        <input type="text" id="e_name_product" class="form-control" readonly>
                    </div>
                    <div>
                        <label for="">Harga Beli</label>
                        <input type="text" id="e_purchase_price" class="form-control">
                    </div>
                    <div>
                        <label for="">Harga Jual</label>
                        <input type="text" id="e_sale_price" class="form-control">
                    </div>
                    <div>
                        <label for="">Quantity</label>
                        <input type="number" id="e_quantity_product" class="form-control">
                    </div>
                    <div>
                        {{-- <label for="">Total</label> --}}
                        <input type="hidden" id="e_total" class="form-control" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="updatePurchase()" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Edit Modal --}}
{{-- Modal Check Out --}}
<div class="modal fade" id="modalCheckOutPurchase" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Check Out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/daftar_pembelian/inputPurchase" method="post">
                    @csrf
                    <div>
                        <table>
                            <tbody id="dataPurchaseCheckOut">

                            </tbody>
                        </table>
                    </div>

                    <input type="hidden" name="id_supplier" id="id_supplier">
                    <div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Diskon (Rp)</label>
                                <input type="number" name="discount" value="0" class="form-control" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Grand total</label>
                                <input type="text" name="grandtotal" id="i_grandtotal" class="form-control" readonly>
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
                            <div class="col-sm-6">
                                <label for="">Bayar</label>
                                <input type="number" onkeyup="purchase_cashback()" class="form-control" name="payment" id="i_payment">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Kembalian</label>
                                <input type="number" class="form-control" name="cashback" id="cashback" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick="cancelledPurchase()" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal Check Out --}}

{{-- Modal Tambah Barang --}}
<div id="tambahBarang" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Barang</h5>
            </div>
            <div class="modal-body">
            <form action="" method="post">
                    @csrf
                    <div>
                        <label for="">Barcode</label>
                        <input type="text" class="form-control" id="tp_barcode" placeholder="Barcode" required>
                        @if ($errors->has('barcode'))
                        <span class="text-danger">{{ $errors->first('barcode') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="tp_name" placeholder="Nama Barang" required>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Harga Beli</label>
                        <input type="number" class="form-control" id="tp_purchase_price" placeholder="Harga Beli" required>
                        @if ($errors->has('purchase_price'))
                        <span class="text-danger">{{ $errors->first('purchase_price') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Harga Jual</label>
                        <input type="number" class="form-control" id="tp_selling_price" placeholder="Harga Jual" required>
                        @if ($errors->has('selling_price'))
                        <span class="text-danger">{{ $errors->first('name_aspek') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Harga Member</label>
                        <input type="number" class="form-control" id="tp_member_price" placeholder="Harga Member" required>
                        @if ($errors->has('member_price'))
                        <span class="text-danger">{{ $errors->first('member_price') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">limit</label>
                        <input type="number" class="form-control" id="tp_limit" placeholder="limit" required>
                        @if ($errors->has('limit'))
                        <span class="text-danger">{{ $errors->first('limit') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Supplier</label>
                        <select class="form-select" name="tp_supplier_id" id="tp_supplier_id" aria-label="Default select example" required>
                            <option value="" selected>Pilih...</option>
                            @foreach ($supplier as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('supplier_id'))
                        <span class="text-danger">{{ $errors->first('supplier_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="TambahProductEpurchase()" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal tambah barang --}}

{{-- Javascript --}}
<script src="{{asset('tmp/javascript/entryPembelian.js')}}"></script>
@endsection
