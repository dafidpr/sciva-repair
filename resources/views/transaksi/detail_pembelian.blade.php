@extends('template.layout')
@section('title', 'Pembelian')
@section('content')
    <div class="card">
        <div class="card-header bg-white">

            <div class="float-sm-end">
                <a href="/admin/daftar_pembelian" class="btn btn-sm btn-secondary"><i class="fa fa-recycle m-right-xs""></i> Back</a>
            </div>
        </div>
        <div class="card-body">
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
                            <td>{{$item->purchase_price}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->sub_total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
