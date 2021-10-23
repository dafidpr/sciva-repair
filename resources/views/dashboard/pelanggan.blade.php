@extends('template.layoutpelanggan')
@section('title', 'Dashboard')
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
                    <h5 class="font-size-22">2</h5>

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
                    <h5 class="font-size-22">1</h5>

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
                    <h5 class="font-size-22">0</h5>

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
                    <h5 class="font-size-22">1</h5>

                </div>
            </div>
        </div>


    </div>
</div>




<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Data Servis</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="piutang" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Unit</th>
                                <th>Status</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SR0000</td>
                                <td>2020-08-10</td>
                                <td>Samsung</td>
                                <td>Selesai</td>
                                <td>100000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Data Hutang</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="stoklimit" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Total</th>
                                <th>jatuh tempo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HT0000</td>
                                <td>Saya</td>
                                <td>100000</td>
                                <td>2021-02-10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
