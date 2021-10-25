@extends('template.layoutpelanggan')
@section('title', 'Ubah Password')
@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div>
                        <label for="">Password Lama</label>
                        <input type="text" class="form-control">
                    </div>
                    <div>
                        <label for="">Password Baru</label>
                        <input type="text" class="form-control">
                    </div>
                    <div>
                        <label for="">Ulangi password</label>
                        <input type="text" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary mt-3">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
