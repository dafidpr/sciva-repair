@extends('template.layout')
@section('title', 'Restore Piutang')
@section('content')

<div class="card">
    <div class="card-body">
        <div>
            <a href="#" onclick="receivablerestoreall()" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i> Restore all</a>
            <a href="#" onclick="receivabledeletepermanent()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete permanent all</a>
            <a href="/admin/del_transaksi" class="btn btn-sm btn-secondary"><i class="fas fa-undo-alt"></i> Back</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Kode Beli</th>
                        <th>Pembeli</th>
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
                    @foreach ($receivable as $item)
                    <tr>
                        @if ($item->sale_id != null)
                        <td>{{$item->_sale->invoice}}</td>
                        <td>{{$item->_sale->_customer->name}}</td>
                        @elseif ($item->service_id != null)
                        <td>{{$item->_servis->transaction_code}}</td>
                        <td>{{$item->_servis->_customer->name}}</td>
                        @endif
                        <td>{{$item->receivable_date}}</td>
                        <td>{{$item->due_date}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->payment}}</td>
                        <td>{{$item->remainder}}</td>
                        <td>
                            @if ($item->status == 'paid off')

                            <span class="badge bg-success">Lunas</span>
                            @else
                            <span class="badge bg-danger">Belum Lunas</span>

                            @endif
                        </td>
                        <td>
                            <a href="#" onclick="receivableforceDelete({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a href="#" onclick="receivablerestoreallid({{$item->id}})" class="btn btn-sm btn-primary"><i class="fas fa-undo-alt"></i></a>
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
<script src="{{asset('tmp/javascript/restorepiutang.js')}}"></script>
@endsection
