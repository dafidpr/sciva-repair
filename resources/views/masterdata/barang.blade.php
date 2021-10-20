@extends('template.layout')
@section('title', 'Barang')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Barang</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga beli</th>
                        <th>Harga jual</th>
                        <th>Harga member</th>
                        <th>Stok</th>
                        <th>Limit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="" class="text-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="text-primary"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>BR-0001</td>
                        <td>Smartwatch</td>
                        <td>570000</td>
                        <td>700000</td>
                        <td>650000</td>
                        <td><span class="btn btn-sm btn-success">10</span></td>
                        <td><span class="btn btn-sm btn-danger">5</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
