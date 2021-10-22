@extends('template.layout')
@section('title', 'Hapus Servis')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white"><h5>Data Servis</h5></div>
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
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-sm btn-primary text-center"><i class="fas fa-trash"></i> Hapus Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
