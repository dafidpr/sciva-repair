@extends('template.layout')
@section('title', 'Restore Penjualan')
@section('content')

<div class="card">
    <div class="card-body">
        <div>
            <a href="#" onclick="salerestoreall()" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i> Restore all</a>
            <a href="#" onclick="saledeletepermanent()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete permanent all</a>
            <a href="/admin/del_transaksi" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> Back</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" widht="80%" id="stoklimit" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Kasir</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Tipe</th>
                        <th>Bayar</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale as $item)
                    <tr>
                        <td>{{$item->invoice}}</td>
                        <td>{{$item->_user->name}}</td>
                        <td>{{$item->_customer->name}}</td>
                        <td>{{number_format($item->total)}}</td>
                        <td>{{$item->method}}</td>
                        <td>{{number_format($item->payment)}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a href="#" onclick="saleforceDelete({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a href="#" onclick="salerestoreallid({{$item->id}})" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- Sweetalert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/restorepenjualan.js')}}"></script>
@endsection
