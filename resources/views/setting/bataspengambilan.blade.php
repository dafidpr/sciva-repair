@extends('template.layout')
@section('title', 'Batas Pengambilan Servis')
@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <p class="text-danger">*Fitur ini digunakan untuk mengatur batas pengambilan barang yang di servis</p>
                        <div>
                            <label for="">Batas saat ini</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="number" value="30" class="form-control" readonly>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" value="Hari" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="">Batas Baru</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="number" value="" class="form-control">
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" value="Hari" class="form-control">
                                </div>
                            </div>
                        </div>
                    <div>
                        <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
