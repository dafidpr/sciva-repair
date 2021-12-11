@extends('template.layout')
@section('title', 'Laba Rugi')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white"><h5>Laporan Laba Kotor</h5></div>
            <div class="card-body">
                <form action="/admin/lap_labarugi/cetak_labakotor" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Awal</label>
                                <input type="datetime-local" name="from" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Akhir</label>
                                <input type="datetime-local" name="to" class="form-control">
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-sm btn-primary text-center"><i class="fas fa-file-pdf"></i> Print PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white"><h5>Laporan Laba Bersih</h5></div>
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
                        <button class="btn btn-sm btn-primary text-center"><i class="fas fa-file-pdf"></i> Print PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
