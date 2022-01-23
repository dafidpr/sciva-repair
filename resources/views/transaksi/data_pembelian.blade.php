@extends('template.layout')
@section('title', 'Pembelian')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" width="100%" id="stoklimit" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Supplier</th>
                            <th>diskon</th>
                            <th>total</th>
                            <th>Pembayaran</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchase as $item)
                        <tr>
                            <td>{{$item->invoice}}</td>
                            <td>{{$item->_supplier->name}}</td>
                            <td>{{number_format($item->discount)}}</td>
                            <td>{{number_format($item->total)}}</td>
                            <td>{{number_format($item->payment)}}</td>
                            <td>{{$item->method}}</td>
                            <td>
                                <a href="/admin/daftar_pembelian/{{$item->id}}/detail_pembelian" class="btn btn-sm btn-primary mb-2"><i class="dripicons-preview"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
