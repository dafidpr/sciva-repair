@extends('template.layout')
@section('title', 'Piutang')
@section('content')

<div class="card">
    <div class="card-body">
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
                        <td>{{$item->_sale->invoice}}</td>
                        <td>{{$item->_sale->_customer->name}}</td>
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
                            @if ($item->status == 'paid off')
                            @can('payment-receivable')
                            <a href="/admin/piutang/{{$item->id}}/detail_receivable" class="btn btn-sm btn-primary"><i class="dripicons-preview"></i></a>
                            @endcan
                            @else
                            @can('detail-receivable')
                            <a href="/admin/piutang/{{$item->id}}/pay_receivable" class="btn btn-sm btn-success"><i class="fas fa-money-bill-wave"></i></a>
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
