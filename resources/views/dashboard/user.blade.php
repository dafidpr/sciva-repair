@extends('template.layout')
@section('content')

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
                    <h5 class="font-size-22">136</h5>

                </div>
            </div>
        </div>


    </div>
</div>

<div class="row">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">



                <h4 class="header-title mb-4 float-sm-start">Grafik Barang terlaris</h4>

                <div class="float-sm-end">

                </div>

                <div class="clearfix"></div>


            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-4 float-sm-start">Piutang Pelanggan</h4>

                <div class="float-sm-end">

                </div>

                <div class="clearfix">
                    <div class="table">
                        <table class="table table-striped">
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
    </div>
</div>

<div class="row">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">



                <h4 class="header-title mb-4 float-sm-start mb-4">Barang stock limit</h4>

                <div class="float-sm-end">

                </div>

                <div class="clearfix">
                    <div class="table">
                        <table class="table table-striped" >
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
                                    <td>Minyak goreng</td>
                                    <td><button class="btn btn-sm btn-danger">4</button></td>
                                    <td><button class="btn btn-sm btn-danger">4</button></td>
                                </tr>
                                <tr>
                                    <td>0002</td>
                                    <td>Royko</td>
                                    <td><button class="btn btn-sm btn-danger">5</button></td>
                                    <td><button class="btn btn-sm btn-danger">5</button></td>
                                </tr>
                                <tr>
                                    <td>0003</td>
                                    <td>Teh Pucuk</td>
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
            <div class="card-body">



                <h4 class="header-title mb-4 float-sm-start">Pelanggan terbaik</h4>

                <div class="float-sm-end">

                </div>

                <div class="clearfix">
                    <div class="table">
                        <table class="table table-striped" id="pelangganterbaik">
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

    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">



                <h4 class="header-title mb-4 float-sm-start">History</h4>

                <div class="float-sm-end">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                    </ul>
                </div>

                <div class="clearfix">
                    <div>
                        <table class="table">
                            <tr>
                                <td>00001 Telah Login Hari ini</td>
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
