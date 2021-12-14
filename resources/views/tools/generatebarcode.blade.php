@extends('template.layout')
@section('title', 'Barcode')
@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="stoklimit" style="font-size:13px;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th width="15%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <td>{{$item->barcode}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->purchase_price}}</td>
                                <td>{{$item->selling_price}}</td>
                                <td>
                                    <a href="#" onclick="selectProductGenerete({{$item->id}})" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <form action="/admin/generatebarcode/update" method="post">
                    @csrf
                    <div>
                        <label for="">BarcodeID (EAN13)</label>
                        <input type="text" name="barcode" id="barcode" class="form-control">
                    </div>
                    <div>
                        <label for="">Nama</label>
                        <input type="text" name="name" id="name_product" class="form-control" readonly>
                        <input type="hidden" name="id" id="id_product" class="form-control" readonly>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="btn btn-sm btn-primary">Cetak</a>
                        <a href="#" class="btn btn-sm btn-primary">Generate</a>
                        <button type="submit" class="btn btn-sm btn-warning">Update Barcode</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h6>View Barcode</h6>
                <div id="viewBarcode"></div>
            </div>
        </div>
    </div>
</div>


{{-- Javascript --}}
<script src="{{asset('tmp/javascript/generatebarcode.js')}}"></script>
@endsection
