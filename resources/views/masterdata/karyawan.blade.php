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

@endsection
