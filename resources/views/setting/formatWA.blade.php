@extends('template.layout')
@section('title', 'Format WA')
@section('content')


<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h4>Format WA</h4>
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
                <form action="/admin/format_WA/updateFormatWA" method="post">
                    @csrf
                    <textarea name="value" class="form-control" id="" cols="20" rows="6">{{$format->value}}</textarea>
                    <div>
                        <span style="font-size: 13px;" class="text-danger">*catatan :</span><br>
                        <span style="font-size: 13px;" class="text-danger">*{code} untuk kode transaksi</span><br>
                        <span style="font-size: 13px;" class="text-danger">*{status} untuk status transaksi</span><br>
                        <span style="font-size: 13px;" class="text-danger">*{harga} untuk harga transaksi</span><br>
                        <span style="font-size: 13px;" class="text-danger">*{batas} untuk batas pengambilan unit</span><br>
                        <span style="font-size: 13px;" class="text-danger">*{batas_type} untuk type batas pengambilan unit (hari/bulan)</span><br>
                        <span style="font-size: 13px;" class="text-danger">*%0A untuk memberikan baris baru</span><br>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
