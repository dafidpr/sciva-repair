@extends('template.layout')
@section('title', 'Bank')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="float-sm-start">
            <h2>Saldo ( Rp. )</h2>
        </div>
        <div class="float-sm-end">
            <h2>
                1.000.000,-
            </h2>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <a href="" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>User</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>KS000001</td>
                        <td>2020-09-10</td>
                        <td>Pemasukan</td>
                        <td>100000</td>
                        <td>Penjualan</td>
                        <td>Administrator</td>
                        <td>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
