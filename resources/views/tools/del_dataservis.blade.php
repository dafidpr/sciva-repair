@extends('template.layout')
@section('title', 'Hapus Servis')
@section('content')




<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

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
                <div class=""><h5>Data Servis</h5></div><br>
                <form action="/admin/del_servis" method="post">
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
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-sm btn-primary text-center"><i class="fas fa-trash"></i> Hapus Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
