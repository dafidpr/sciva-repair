@extends('template.layout')
@section('title', 'Stok In/Out')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Stok</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Jenis</th>
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
                        <td>Battery>
                        <td>100</td>
                        <td>Stok masuk</td>
                        <td>Nice</td>
                        <td>2020-09-10</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
