@extends('template.layout')
@section('title', 'Stok Opname')
@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Edit Stock Opname</h4>

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

                <div>
                    <form action="/admin/stockopname/update/{{$opname->id}}" method="post">
                        @csrf
                        <div>
                            <label for="">Barcode</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="product_id" id="id" value="{{$opname->_product->id}}" readonly>
                            <label for="">Barcode</label>
                            <input type="text" class="form-control" name="barcode" id="barcode" value="{{$opname->_product->barcode}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Nama Barang</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$opname->_product->name}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Harga Beli</label>
                            <input type="text" class="form-control" name="purchase_price" id="purchase_price" value="{{$opname->_product->purchase_price}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Stock</label>
                            <input type="number" class="form-control" name="stock" id="stock" value="{{$opname->_product->stock}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Stock Nyata</label>
                            <input type="number" class="form-control" name="real_stock" id="real_stock" value="{{$opname->real_stock}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{$opname->decription}}" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Save Change</button>
                            <a href="/admin/stockopname" class="btn btn-sm btn-danger"><i class="fas fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

{{-- Detail Product --}}
<td>
    <!-- Large modal -->
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Modal demo</button> --}}

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" id="pilihbarang" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Pilih Barang</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" style="width: 100%" id="piutang">
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
                                    <td>{{$item->purchase_price}}</td>
                                    <td>
                                        <button type="button" onclick="select_product({{$item->id}})" class="btn btn-sm btn-primary"><i class="far fa-check-square"></i> Pilih</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</td>
{{-- End Detail Product --}}

{{-- Sweetalert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/opname.js')}}"></script>
@endsection
