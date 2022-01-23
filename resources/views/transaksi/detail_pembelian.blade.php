@extends('template.layout')
@section('title', 'Pembelian')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="float-sm-end">
                        <a href="/admin/daftar_pembelian" class="btn btn-sm btn-secondary"><i class="fa fa-recycle m-right-xs""></i> Back</a>
                    </div>
                </div>
            </div><hr>

            <div class="table-responsive">
                <table class="table table-striped" widht="80%" id="stoklimit" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $item)
                        <tr>
                            <td>{{$item->_product->barcode}}</td>
                            <td>{{$item->_product->name}}</td>
                            <td>{{number_format($item->purchase_price)}}</td>
                            <td>{{number_format($item->selling_price)}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{number_format($item->sub_total)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
