@extends('template.layout')
@section('title', 'Servis')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <h3 class=" mb-4 float-sm-start">Servis</h3>

        <div class="float-sm-end">
            <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>
    <div class="card-body">

        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="stoklimit">
                <thead>
                    <tr>
                        <th>aksi</th>
                        <th>Tanggal</th>
                        <th>No Nota</th>
                        <th>Pelanggan</th>
                        <th>Unit</th>
                        <th>No seri</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td class="text-primary">
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-money-bill"></i>
                            <i class="fas fa-search"></i>
                            <i class="fas fa-trash-alt"></i>
                        </td>
                        <td>10-09-2021</td>
                        <td>SCR-00001</td>
                        <td>Ahmadina</td>
                        <td>Samsung galaxy</td>
                        <td>66488657790008876</td>
                        <td><span class="bg-primary badge">Dalam Proses</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
