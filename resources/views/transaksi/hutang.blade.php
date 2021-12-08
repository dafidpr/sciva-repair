@extends('template.layout')
@section('title', 'Hutang')
@section('content')

<div class="card">
    <div class="card-body">
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
                            @if ($item->status == 'paid_off')
                            @can('detail-debt')
                            <a href="/admin/hutang/{{$item->id}}/detail_debt" class="btn btn-sm btn-primary"><i class="dripicons-preview"></i></a>
                            @endcan
                            @elseif ($item->status == 'not yet paid')
                            @can('payment-debt')
                            <a href="/admin/hutang/{{$item->id}}/view_payment_debt" class="btn btn-sm btn-success"><i class="fas fa-money-bill-wave"></i></a>
                            @endcan
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
