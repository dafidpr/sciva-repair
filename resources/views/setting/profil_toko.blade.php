@extends('template.layout')
@section('title', 'Profil Toko')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">SCIVA CENTER REPAIR</h5>
                    <div class="text-right">
                        <p><i class="fas fa-map-marker-alt"></i> Jl.Raja Wali Jakarta</p>
                        <p><i class="fas fa-phone-alt"></i> Telp. 0883402480</p>
                        <p><i class="fas fa-tty"></i> Fax: (003) 067645</p>
                        <p><i class="fas fa-envelope-square"></i> Emailtoko@gmail.com</p>
                        <p><i class="fas fa-external-link-alt"></i> www.toktoko.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <form action="">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                                <input type="text" class="form-control" placeholder="Nama Toko" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Alamat" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                                <input type="text" class="form-control" placeholder="No Telephone" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Fax:" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-tty"></i></span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><i class="fas fa-envelope-square"></i></span>
                                <input type="text" class="form-control" placeholder="email" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Situs.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-external-link-alt"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3"><i class="fas fa-images"></i></span>
                            <input type="file" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                        <div>
                            <button class="btn btn-sm btn-success"><i class="far fa-edit"></i> Edit Profile</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
