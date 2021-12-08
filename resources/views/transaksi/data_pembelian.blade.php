@extends('template.layout')
@section('title', 'Pembelian')
@section('content')
    <div class="card">
        <div class="card-header bg-white">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" widht="80%" id="stoklimit" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Supplaier</th>
                            <th>diskon</th>
                            <th>total</th>
                            <th>payment</th>
                            <th>method</th>
                            <th>Opsi</th>
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
