@extends('template.layout')
@section('title', 'Restore Hutang')
@section('content')

<div class="card">
    <div class="card-body">
        <div>
            <a href="#" onclick="debtrestoreall()" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i> Restore all</a>
            <a href="#" onclick="debtdeletepermanent()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete permanent all</a>
            <a href="/admin/del_transaksi" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> Back</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Kode Beli</th>
                        <th>Supplier</th>
                        <th>tgl hutang</th>
                        <th>Jatuh tempo</th>
                        <th>Total hutang</th>
                        <th>Total bayar</th>
                        <th>sisa</th>
                        <th>status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($debt as $item)
                    <tr>
                        <td>{{$item->_purchase->invoice}}</td>
                        <td>{{$item->_purchase->_supplier->name}}</td>
                        <td>{{$item->debt_date}}</td>
                        <td>{{$item->due_date}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->payment}}</td>
                        <td>{{$item->remainder}}</td>
                        <td>
                            @if ($item->status == 'paid_off')
                            <span class="badge bg-success">Lunas</span>
                            @elseif ($item->status == 'not yet paid')
                            <span class="badge bg-danger">Belum Lunas</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" onclick="debtforceDelete({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a href="#" onclick="debtrestoreallid({{$item->id}})" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<table>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

{{-- Sweetalert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/restorehutang.js')}}"></script>
@endsection
