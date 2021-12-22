@extends('template.layout')
@section('title', 'Penjualan')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Laporan Penjualan</h5>
                <form action="/admin/lap_penjualan/cetak_sale" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="dateFrom" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="dateTo" class="form-control">
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
