@extends('template.layout')
@section('title', 'Stok In/Out')
@section('content')

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

<div class="card">

    <div class="card-body">
        @can('create-stocks')
        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"s><i class="fas fa-plus"></i> Tambah Stok</a>
        @endcan
        <hr>


        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Nilai</th>
                        <th>Tipe</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        @can('delete-stocks')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stock as $item)
                    <tr>
                        <td>{{$item->_product->barcode}}</td>
                        <td>{{$item->_product->name}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{number_format($item->value)}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            {{-- <a href="" class="text-primary"><i class="fas fa-edit"></i></a> --}}
                            @can('delete-stocks')
                            <a href="#" class="text-primary" onclick="hapusData({{$item->id}})"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- Create Modals --}}
<td>
    <!-- Small modal -->
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Modal demo</button> --}}

    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Tambah Stok In/Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/stock_in_out/create" method="post">
                        @csrf
                        <div>
                            <label for="">Pilih Barang</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="purchase_price" id="purchase_price" readonly>
                            <input type="hidden" class="form-control" name="id" id="id" readonly>
                            <label for="">Barcode</label>
                            <input type="text" class="form-control" name="barcode" id="barcode" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" id="name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Tipe</label>
                            <select class="form-select" name="type" id="type" aria-label="Default select example" required>
                                <option value="">Pilih Tipe</option>
                                <option value="in">Stok Masuk</option>
                                <option value="out">Stok Keluar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Jumlah</label>
                            <input type="text" class="form-control" name="total" id="total" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <input type="text" class="form-control" name="description" id="description" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</td>
{{-- End Create Modals --}}

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
                                    <td>Stok</td>
                                    {{-- <td>Harga</td> --}}
                                    <td>#</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                <tr>
                                    <td>{{$item->barcode}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->stock}}</td>
                                    {{-- <td>{{$item->purchase_price}}</td> --}}
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
<script src="{{asset('tmp/javascript/stock.js')}}"></script>
@endsection
