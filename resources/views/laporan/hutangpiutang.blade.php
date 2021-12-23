@extends('template.layout')
@section('title', 'Hutang Piutang')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            {{-- <div class="card-header bg-white">
            </div> --}}
            <div class="card-body">
                <h5>Laporan Hutang</h5><hr>
                <form action="/admin/lap_hutangpiutang/print_debt" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="from" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="">Berdasarkan Supplaier</label>
                                <select class="select2 form-control" name="supplier" id="technician" aria-label="Default select example">
                                    <option selected value="all">Semua Supllier</option>
                                    @foreach ($supplier as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-sm btn-primary text-center"><i class="fas fa-file-pdf"></i> Print PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white"><h5>Laporan Piutang</h5></div>
            <div class="card-body">
                <form action="/admin/lap_hutangpiutang/print_receivable" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="from" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="">Berdasarkan Customer</label>
                                <select class="select2 form-control" name="customer" id="jasa" aria-label="Default select example">
                                    <option selected value="all">Semua Customer</option>
                                    @foreach ($customer as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-sm btn-primary text-center"><i class="fas fa-file-pdf"></i> Print PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
