@extends('template.layout')
@section('title', 'Restore Pembelian')
@section('content')

<div class="card">
    <div class="card-body">
        <div>
            <a href="#" onclick="purchaserestoreall()" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i> Restore all</a>
            <a href="#" onclick="purchasedeletepermanent()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete permanent all</a>
            <a href="/admin/del_transaksi" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> Back</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" widht="80%" id="stoklimit" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Supplier</th>
                        <th>Diskon</th>
                        <th>Total</th>
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
                            <a href="#" onclick="purchaseforceDelete({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a href="#" onclick="purchaserestoreallid({{$item->id}})" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i></a>
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
<script src="{{asset('tmp/javascript/restorepembelian.js')}}"></script>
@endsection
