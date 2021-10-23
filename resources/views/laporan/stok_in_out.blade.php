@extends('template.layout')
@section('title', 'Stok In/Out')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white"><h5>Laporan Stok In/Out</h5></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <label for="">Tanggal Awal</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <label for="">Tanggal Akhir</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="">Berdasarkan Jenis</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Semua</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-sm btn-primary"><i class="fas fa-file-pdf"></i> Print PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
