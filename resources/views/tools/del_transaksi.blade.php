@extends('template.layout')
@section('title', 'Hapus Transaksi')
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="float-sm-start">Data Penjualan</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="float-sm-end">
                            <a href="/admin/restore/getRestoreSale" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> Restore Data</a>
                        </div>
                    </div>
                </div>
                <form action="/admin/del_transaksi/deleteSale" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="from" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type='submit' class="btn btn-sm btn-primary text-center"><i class="fas fa-trash"></i> Hapus Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="float-sm-start">Data Pembelian</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="float-sm-end">
                            <a href="/admin/restore/getRestorePurchase" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> Restore Data</a>
                        </div>
                    </div>
                </div>
                <form action="/admin/del_transaksi/deletePurchase" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="from" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-sm btn-primary text-center"><i class="fas fa-trash"></i> Hapus Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="float-sm-start">Data Hutang Lunas</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="float-sm-end">
                        <a href="/admin/restore/getRestoreDebt" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> Restore Data</a></div>
                    </div>
                </div>
                <form action="/admin/del_transaksi/deleteDebt" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="from" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-sm btn-primary text-center"><i class="fas fa-trash"></i> Hapus Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="float-sm-start">Data Piutang Lunas</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="float-sm-end">
                            <a href="/admin/restore/getRestoreReceivable" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> Restore Data</a>
                        </div>
                    </div>
                </div>
                <form action="/admin/del_transaksi/deleteReceivable" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="from" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-sm btn-primary text-center"><i class="fas fa-trash"></i> Hapus Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
