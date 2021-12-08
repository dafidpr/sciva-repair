@extends('template.layout')
@section('title', 'Profil Toko')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img width="200px" src="{{asset('tmp/asset/images'). '/'. $company->logo}}" alt="">
                    <h5 class="text-center">{{$company->name}}</h5>
                    <div class="text-right">
                        <p><i class="fas fa-map-marker-alt"></i> {{$company->address}}</p>
                        <p><i class="fas fa-phone-alt"></i> Telp. {{$company->telephone}}</p>
                        <p><i class="fas fa-tty"></i> Fax: {{$company->fax}}</p>
                        <p><i class="fas fa-envelope-square"></i> Email: {{$company->email}}</p>
                        <p><i class="fas fa-external-link-alt"></i> Ig: {{$company->instagram}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/profil/changeProfil" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                                <input type="text" class="form-control" name="name" placeholder="Nama Toko" aria-label="Username" aria-describedby="basic-addon1" value="{{$company->name}}" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Alamat" name="address" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$company->address}}" required>
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                                <input type="text" class="form-control" name="telephone" placeholder="No Telephone" aria-label="Username" aria-describedby="basic-addon1" value="{{$company->telephone}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="fax" placeholder="Fax:" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$company->fax}}" required>
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-tty"></i></span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><i class="fas fa-envelope-square"></i></span>
                                <input type="text" class="form-control" name="email" placeholder="email" id="basic-url" aria-describedby="basic-addon3" value="{{$company->email}}" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="instagram" placeholder="Instagram.." aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$company->instagram}}" required>
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-external-link-alt"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-images"></i></span>
                            <input type="file" name="logo" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-success"><i class="far fa-edit"></i> Edit Profile</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
