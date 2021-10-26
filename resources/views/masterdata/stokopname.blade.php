@extends('template.layout')
@section('title', 'Stok Opname')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>stok gudang</th>
                        <th>stok nyata</th>
                        <th>selisih</th>
                        <th>nilai</th>
                        <th>keterangan</th>
                        <th>tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="" class="text-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="text-primary"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>BR-0001</td>
                        <td>Battery</td>
                        <td>100</td>
                        <td>50</td>
                        <td>50</td>
                        <td>000</td>
                        <td>Nice</td>
                        <td>2020-09-10</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
