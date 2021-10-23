@extends('template.layout')
@section('title', 'Supplier')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Supplier</a>
        <a href="" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i> Export Barang</a>
        <a href="" class="btn btn-light btn-sm"><i class="fas fa-upload"></i> Import Barang</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Telepone</th>
                        <th>Email</th>
                        <th>Bank</th>
                        <th>Rekening</th>
                        <th>Alamat</th>
                        <th>Jenis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="" class="text-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="text-primary"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>SPL-0001</td>
                        <td>CV.Prima</td>
                        <td>0843245678</td>
                        <td>Priman@gmail</td>
                        <td>BRI</td>
                        <td>98787898999</td>
                        <td>Rogojampi</td>
                        <td>Member</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
