@extends('template.layout')
@section('title', 'Footer Nota')
@section('content')

@if (session('berhasil'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
            <strong>Selamat</strong> {{session('berhasil')}}.
        </div>
@endif
@if (session('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
            <strong>Maaf</strong> {{session('gagal')}}.
        </div>
@endif

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Penjualan</h4>
                <form action="/admin/footer_nota/updateNotaSale" method="post">
                    @csrf
                    <textarea name="value" class="form-control" id="" cols="20" rows="6" required>{{$footer_sale->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Servis</h4>
                <form action="/admin/footer_nota/updateNotaServis" method="post">
                    @csrf
                    <textarea name="value" class="form-control" id="" cols="20" rows="6">{{$footer_servis->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Servis Diambil</h4>
                <form action="/admin/footer_nota/updateNotaServisTake" method="post">
                    @csrf
                    <textarea name="value" class="form-control" id="" cols="20" rows="6">{{$footer_servis_take->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
