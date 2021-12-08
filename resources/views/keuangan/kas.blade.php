@extends('template.layout')
@section('title', 'Kas')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="float-sm-start">
            <h2>Saldo ( Rp. )</h2>
        </div>
        <div class="float-sm-end">
            <h2 id="">
                {{number_format($total)}}
            </h2>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        @if (session('berhasil'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
            <strong>Selamat</strong> {{session('berhasil')}}.
        </div><hr>
        @endif
        @if (session('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
            <strong>Maaf</strong> {{session('gagal')}}.
        </div><hr>
        @endif

        @can('create-cash')
        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
        @endcan

        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>User</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cash as $item)
                    <tr>
                        <td>{{$item->cash_code}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            @if ($item->source == 'income')
                                <p>pemasukan</p>
                            @elseif ($item->source == 'expenditure')
                                <p>pengeluaran</p>
                            @endif
                        </td>
                        <td>{{number_format($item->nominal)}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->_user->name}}</td>
                        <td>
                            @can('delete-cash', Model::class)
                            <a href="#" onclick="hapusdata({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modals Create --}}
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/kas/create_cash" method="post">
                    @csrf
                    <div>
                        <label for="">Kode</label>
                        <input type="text" name="cash_code" value="{{$cash_id}}" class="form-control" readonly>
                    </div>
                    <div>
                        <label for="">Jenis</label>
                        <select class="form-select" name="source" aria-label="Default select example">
                            <option selected="">--Pilih--</option>
                            <option value="income">Pemasukan</option>
                            <option value="expenditure">Pengeluaran</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Nominal</label>
                        <input type="number" name="nominal" required class="form-control">
                    </div>
                    <div>
                        <label for="">Keterangan</label>
                        <textarea name="description" class="form-control" required id="" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modals Create --}}





{{-- Sweetalert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/kas.js')}}"></script>
@endsection
