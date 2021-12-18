@extends('template.layoutpelanggan')
@section('title', 'Ubah Password')
@section('content')

<div class="row">
    <div class="col-md-5">
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
                <form action="/pelanggan/ubahpassword/ubah" method="post">
                    @csrf
                    <div>
                        <label for="">Password Lama</label>
                        <input type="password" name="oldPass" value="{{old('oldPass')}}" class="form-control">
                        @if ($errors->has('oldPass'))
                            <span class="text-danger">{{ $errors->first('oldPass') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Password Baru</label>
                        <input type="password" name="newPass" class="form-control">
                        @if ($errors->has('newPass'))
                            <span class="text-danger">{{ $errors->first('newPass') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Ulangi password</label>
                        <input type="password" name="newPass2" class="form-control">
                        @if ($errors->has('newPass2'))
                            <span class="text-danger">{{ $errors->first('newPass2') }}</span>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
