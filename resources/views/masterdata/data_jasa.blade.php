@extends('template.layout')
@section('title', 'Jasa')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Jasa</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="" class="text-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="text-primary"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>JS-0001</td>
                        <td>Servis 50k</td>
                        <td>50000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
