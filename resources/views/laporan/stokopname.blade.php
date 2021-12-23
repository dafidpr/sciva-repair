@extends('template.layout')
@section('title', 'Stok Opname')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Laporan Stok Opname</h5>
                <form action="/admin/lap_stokopname/print_opname" method="post">
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
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-file-pdf"></i> Print PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
