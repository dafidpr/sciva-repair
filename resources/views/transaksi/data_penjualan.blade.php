@extends('template.layout')
@section('title', 'penjualan')
@section('content')
    <div class="card">
        <div class="card-header bg-white">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" widht="80%" id="stoklimit" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Kasir</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Type</th>
                            <th>Bayar</th>
                            <th>Waktu</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sale as $item)
                        <tr>
                            <td>{{$item->invoice}}</td>
                            <td>{{$item->_user->name}}</td>
                            <td>{{$item->_customer->name}}</td>
                            <td>{{$item->total}}</td>
                            <td>{{$item->method}}</td>
                            <td>{{$item->payment}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="/admin/daftar_penjualan/show/{{$item->id}}" class="btn btn-sm btn-primary mb-2"><i class="dripicons-preview"></i></a>
                                <a href="" class="btn btn-sm btn-success mb-2"><i class="dripicons-print"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
