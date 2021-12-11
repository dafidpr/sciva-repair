@extends('template.layout')
@section('title', 'Stok In/Out')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white"><h5>Laporan Stok In/Out</h5></div>
            <div class="card-body">
                <form action="/admin/lap_stok_in_out/print_report" method="post">
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
                    <div>
                        <div>
                            <label for="">Berdasarkan Jenis</label>
                            <select class="form-select" name="type" aria-label="Default select example">
                                <option selected value="all">Semua</option>
                                <option value="in">Stok Masuk</option>
                                <option value="out">Stok Keluar</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-file-pdf"></i> Print PDF</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
