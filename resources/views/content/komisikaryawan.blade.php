@extends('template.layout')
@section('title', 'Komisi')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" name="tanggal_awal" class="form-control">
                    </div>
                </div>
                <div>
                    <label for="">Nama Karyawan</label>
                    <input type="text" class="form-control">
                </div>
                <div style="font-size: 12px;">
                    <span class="text-danger">Perhatian : Fitur ini berfungsi untuk mengetahui prestasi karyawan dan perolehan komisi karyawan per periode tanggal yang anda tentukan.</span>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-primary"><i class="fas fa-file-pdf"></i> Export PDF</button>
                </div>
            </div>
            </div>
    </div>
</div>

@endsection
