@extends('template.layout')
@section('title', 'Karyawan')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Karyawan</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Komisi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="" class="text-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="text-primary"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>KR-0001</td>
                        <td>Fahri</td>
                        <td>alfahri</td>
                        <td>Teknisi</td>
                        <td>00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h6>Level Karyawan</h6>
    </div>
    <div class="card-body">
        <a href="" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Level</a>
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th>Level</th>
                        <th width="50%">Permision</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Admin</th>
                        <th> semua semua semua semua semua semua semua</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
