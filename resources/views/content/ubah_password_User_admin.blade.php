@extends('template.layout')
@section('title', 'Karyawan')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="/admin/karyawan/ubahPassByadmin/{{$user->id}}" method="post">
                    @csrf
                    <div>
                        <label for="">Password Terbaru</label>
                        <input type="password" class="form-control" name="password1">
                        @if ($errors->has('password1'))
                        <span class="text-danger">{{ $errors->first('password1') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Ulangi Password</label>
                        <input type="password" class="form-control" name="password2">
                        @if ($errors->has('password2'))
                        <span class="text-danger">{{ $errors->first('password2') }}</span>
                        @endif
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Ubah Password</button>
                        <a href="/admin/karyawan" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
