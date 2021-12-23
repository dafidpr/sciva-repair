@extends('template.layout')
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
                <form action="/admin/ubahpassword/ubah" method="post">
                    @csrf
                    <div>
                        <label for="">Password Lama</label>
                        <input type="password" name="oldpassword" value="" class="form-control">
                        @if ($errors->has('oldpassword'))
                            <span class="text-danger">{{ $errors->first('oldpassword') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Password Baru</label>
                        <input type="password" name="newpassword" value="{{old('newpassword')}}" class="form-control">
                        @if ($errors->has('newpassword'))
                            <span class="text-danger">{{ $errors->first('newpassword') }}</span>
                            @endif
                    </div>
                    <div>
                        <label for="">Ulangi password</label>
                        <input type="password" name="newpassword2" class="form-control">
                        @if ($errors->has('newpassword2'))
                            <span class="text-danger">{{ $errors->first('newpassword2') }}</span>
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
