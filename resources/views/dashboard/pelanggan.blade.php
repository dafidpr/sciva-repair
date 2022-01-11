@extends('template.layoutpelanggan')
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
                    <h5 class="font-size-22">{{$servisSelesai}}</h5>

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
                    <h5 class="font-size-22">{{$waitingSparepart}}</h5>

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
                    <h5 class="font-size-22">{{$batal}}</h5>

                </div>
            </div>
        </div>


    </div>
</div>




<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4>Data Servis</h4><hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="piutang" width="100%" style="font-size: 13px;">
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
                            @foreach ($servis as $item)

                            <tr>
                                <td>{{$item->transaction_code}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->unit}}</td>
                                <td>
                                    @if ($item->status == 'finished')
                                    <span class="bg-success badge">Selesai</span>
                                    @elseif ($item->status == 'proses')
                                    <span class="bg-primary badge">Dalam Proses</span>
                                    @elseif ($item->status == 'waiting sparepart')
                                    <span class="bg-warning badge">Menunggu sparepart</span>
                                    @elseif ($item->status == 'cancelled')
                                    <span class="bg-danger badge">Batal</span>
                                    @elseif ($item->status == 'take')
                                    <span class="bg-secondary badge">Diambil</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->total == null)
                                        -
                                    @else

                                    {{$item->total}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4>Data Hutang</h4><hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="stoklimit" width="100%" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Total</th>
                                <th>jatuh tempo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recei as $item)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->due_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
