@extends('template.layout')
@section('title', 'Piutang')
@section('content')
<div class="card">
    <div class="card-header bg-white">
        <div class="float-sm-end">
            <a href="/admin/piutang" class="btn btn-sm btn-secondary"><i class="fa fa-recycle m-right-xs"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>Operator</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receivable as $item)
                    <tr>
                        <td>{{$item->_user->name}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->nominal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
