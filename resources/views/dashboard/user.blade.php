@extends('template.layout')
@section('title', 'Dashboard')
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
    <div class="col-xl-3 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Servis Masuk</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-primary">
                                <i class="fas fa-hammer text-primary font-size-20"></i>
                            </span>
                    </div>
                    <h5 class="font-size-22">58</h5>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Servis Selesai</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-success">
                                <i class="fas fa-check text-success font-size-20"></i>
                            </span>
                    </div>
                    <h5 class="font-size-22">58</h5>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Menunggu Sparepat</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-primary">
                                <i class="fas fa-users text-primary font-size-20"></i>
                            </span>
                    </div>
                    <h5 class="font-size-22">58</h5>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <p class="font-size-16">Servis Batal</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-danger">
                                <i class="far fa-times-circle text-danger font-size-20"></i>
                            </span>
                    </div>
                    <h5 class="font-size-22">10</h5>

                </div>
            </div>
        </div>


    </div>
</div>

<div class="row">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-header bg-white">
                <h4 class="header-title mb-4 float-sm-start">Grafik Barang terlaris</h4>

                <div class="float-sm-end">

                </div>
            </div>
            <div class="card-body">

                <div class="clearfix" style="width: 100%;">
                    <div class="table-responsive mb-0 fixed-solution">
                        <canvas id="G_barang_laris"></canvas>
                    </div>
                </div>


            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h4 class="header-title mb-4 float-sm-start mb-4">Barang stock limit</h4>
            </div>
            <div class="card-body">


                <div class="clearfix">
                    <div class="table-responsive mb-0 fixed-solution">
                        <table class="table table-striped" id='stoklimit' widht='60%' style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Limit</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0001</td>
                                    <td>Battery Smartphone</td>
                                    <td><button class="btn btn-sm btn-danger">4</button></td>
                                    <td><button class="btn btn-sm btn-danger">4</button></td>
                                </tr>
                                <tr>
                                    <td>0002</td>
                                    <td>Charger</td>
                                    <td><button class="btn btn-sm btn-danger">5</button></td>
                                    <td><button class="btn btn-sm btn-danger">5</button></td>
                                </tr>
                                <tr>
                                    <td>0003</td>
                                    <td>Headset</td>
                                    <td><button class="btn btn-sm btn-danger">2</button></td>
                                    <td><button class="btn btn-sm btn-danger">2</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="card">
            <div class="card-header bg-white">

                <h4 class="header-title mb-4 float-sm-start">Piutang Pelanggan</h4>

                <div class="float-sm-end">

                </div>
            </div>
            <div class="card-body">


                <div class="clearfix">
                    <div class="table-responsive">
                        <table class="table table-striped" id="piutang" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Hutang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Siti</td>
                                    <td>Rp.10000</td>
                                    <td><a href="" class="btn btn-sm btn-success"><i class="fas fa-hand-holding-usd"></i> Payment</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
        <div class="card">

                <div class="card-header bg-white">

                    <h4 class="header-title mb-4 float-sm-start mb-4">Pelanggan terbaik</h4>

                    <div class="float-sm-end">

                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="bestpelanggan" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Total servis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Fikri Hasan</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


        </div>
    </div>
</div>

<div>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4 mb-4">History</h4>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Penjualan</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Service</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Login</button>
                </li>
              </ul>


              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-bordered" style="font-size: 13px;">
                        <tr>
                            <td><p class="mb-3"><b>00001</b> Oleh <b>Admin</b> pada tanggal: <b>19-09-2020</b></p></td>
                        </tr>
                        <tr>
                            <td><p class="mb-3"><b>00001</b> Oleh <b>Admin</b> pada tanggal: <b>19-09-2020</b></p></td>
                        </tr>
                        <tr>
                            <td><p class="mb-3"><b>00001</b> Oleh <b>Admin</b> pada tanggal: <b>19-09-2020</b></p></td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-bordered" style="font-size: 13px;">
                        <tr>
                            <td><p class="mb-3"><b>00001</b> Oleh <b>Admin</b> pada tanggal: <b>19-09-2020</b></p></td>
                        </tr>
                        <tr>
                            <td><p class="mb-3"><b>00001</b> Oleh <b>Admin</b> pada tanggal: <b>19-09-2020</b></p></td>
                        </tr>
                        <tr>
                            <td><p class="mb-3"><b>00001</b> Oleh <b>Admin</b> pada tanggal: <b>19-09-2020</b></p></td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table-bordered" style="font-size: 13px;">
                        <tr>
                            <td>
                                <p class="mb-3"><b>00001</b> telah Login pada tanggal: <b>19-09-2020</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-3"><b>00001</b> telah Login pada tanggal: <b>19-09-2020</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-3"><b>00001</b> telah Login pada tanggal: <b>19-09-2020</b></p>
                            </td>
                        </tr>
                    </table>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
