@extends('template.layout')
@section('title', 'Format WA')
@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Format WA</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <textarea name="" class="form-control" id="" cols="20" rows="6">
[ Sciva Repair Center ]
Selamat Siang,
Perbaikan TWS XXXX Anda telah SELESAI dg biaya Rp 25.000.
Segera lakukan pengambilan barang SEBELUM 30 SEPTEMBER 2021.
*Pastikan anda membawa nota saat pengambilan barang
Terima Kasih.

                    </textarea>
                    <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
