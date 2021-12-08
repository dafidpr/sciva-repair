@extends('template.layout')
@section('title', 'Piutang')
@section('content')


<div>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/piutang/pembayaran_piutang" method="post">
                        @csrf
                        <div>
                            <label for="">Total Hutang</label>
                            <input type="text" value="{{$receivable->remainder}}" name="total" class="form-control" readonly>
                            <input type="hidden" value="{{$receivable->id}}" name="receivable_id" class="form-control" readonly>
                        </div>
                        <div>
                            <label for="">Pembayaran</label>
                            <input type="text" name="payment" class="form-control">
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-sm btn-primary text-center"><i class="fas fa-hand-holding-usd"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Operator</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $item)
                                <tr>
                                    <td>{{$item->_user->name}}</td>
                                    <td>{{$item->payment_date}}</td>
                                    <td>{{$item->nominal}}</td>
                                    <td>
                                        <a href="/admin/piutang/{{$item->id}}/delete_receivable" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
