@extends('template.layout')
@section('title', 'Batas Pengambilan Servis')
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
                <form action="/admin/bataspengambilan/updateBatas" method="post">
                    @csrf
                <p class="text-danger">*Fitur ini digunakan untuk mengatur batas pengambilan barang yang di servis</p>
                        <div>
                            <label for="">Batas saat ini</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="number" value="{{$batas->value}}" class="form-control" readonly>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" value="{{$type->value}}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="">Batas Baru</label>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="number" name="batas" value="" class="form-control">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" name="type" value="{{$type->value}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>

@endsection
