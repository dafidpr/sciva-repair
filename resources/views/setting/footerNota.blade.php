@extends('template.layout')
@section('title', 'Footer Nota')
@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Footer Nota Penjualan</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <textarea name="" class="form-control" id="" cols="20" rows="6">
Terima kasih
Telah Melakukan servis
Di tempat kami
                    </textarea>
                    <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Footer Nota Servis</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <textarea name="" class="form-control" id="" cols="20" rows="6">
Terima kasih
Telah Melakukan servis
Di tempat kami
                    </textarea>
                    <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
