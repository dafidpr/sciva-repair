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
                    <h5 class="font-size-22">{{$servisMasuk->total()}}</h5>

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
                    <h5 class="font-size-22">{{$servisSelesai->total()}}</h5>

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
                    <h5 class="font-size-22">{{$waitingSparepart->total()}}</h5>

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
                    <h5 class="font-size-22">{{$servisBatal->total()}}</h5>

                </div>
            </div>
        </div>


    </div>
</div>

<div class="row">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Grafik Barang terlaris</h4>

                <div class="clearfix" style="width: 100%;">
                    <div class="table-responsive mb-0 fixed-solution">
                        <canvas id="G_barang_laris"></canvas>
                    </div>
                </div>


            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Barang stock limit</h4>


                <div class="clearfix">
                    <div class="table-responsive mb-0 fixed-solution">
                        <table class="table table-striped" id='stoklimit' width='100%' style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Limit</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                @if ($item->stock <= $item->limit)
                                <tr>
                                    <td>{{$item->barcode}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><button class="btn btn-sm btn-danger">{{$item->limit}}</button></td>
                                    <td>
                                        @if ($item->stock <= $item->limit)
                                        <button class="btn btn-sm btn-danger">{{$item->stock}}</button>
                                        @else
                                        <button class="btn btn-sm btn-success">{{$item->stock}}</button>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
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
                <h4 class="header-title mb-4 ">Piutang Pelanggan</h4>


                <div class="clearfix">
                    <div class="table-responsive">
                        <table class="table table-striped" id="piutang" style="font-size: 14px; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Hutang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receivable as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if ($item->sale_id == null)
                                        {{$item->_servis->_customer->name}}
                                        @else
                                        {{$item->_sale->_customer->name}}
                                        @endif
                                    </td>
                                    <td>Rp. {{number_format($item->total)}}</td>
                                    <td>
                                        @can('detail-receivable')
                                        <a href="/admin/piutang/{{$item->id}}/pay_receivable" class="btn btn-sm btn-success"><i class="fas fa-hand-holding-usd"></i> Payment</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
        <div class="card">


                <div class="card-body">
                    <h4 class="header-title mb-4">Pelanggan terbaik</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="bestpelanggan" width="100%" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Total servis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($csbest as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->total}}</td>
                                </tr>
                                @endforeach
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
                        @foreach ($historysale as $item)

                        <tr>
                            <td><p class="mb-3"><b>{{$item->invoice}}</b> Oleh <b>{{$item->_user->name}}</b> pada tanggal: <b>{{$item->created_at}}</b></p></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-bordered" style="font-size: 13px;">
                        @foreach ($historyservis as $item)
                        <tr>
                            <td><p class="mb-3"> Servis Masuk dengan Kode <b>{{$item->transaction_code}}</b> pada tanggal: <b>{{$item->created_at}}</b></p></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table-bordered" style="font-size: 13px;">
                        @foreach ($historylogin as $item)
                        <tr>
                            <td>
                                <p class="mb-3"><b>{{$item->username}}</b> telah Login pada tanggal: <b>{{$item->login_at}}</b></p>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
              </div>
        </div>
    </div>
</div>



<script>
    const name = [
                    @foreach ($terlaris as $item)
                    <?= "'".$item->name."'"?>,
                    @endforeach
                    ];

    var total = [
                    @foreach ($terlaris as $item)
                    <?= "'".$item->total."'"?>,
                    @endforeach
                    ];
</script>
@endsection
