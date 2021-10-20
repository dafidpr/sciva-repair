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
                    <tr>
                        <td>PB000001</td>
                        <td>Celuller Cinta</td>
                        <td>2020-09-10</td>
                        <td>2020-09-20</td>
                        <td>300000</td>
                        <td>300000</td>
                        <td>0</td>
                        <td><span class="badge bg-success">Lunas</span></td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary"><i class="dripicons-preview"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
