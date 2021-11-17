@extends('template.layout')
@section('title', 'Servis')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <h3 class=" mb-4 float-sm-start">Servis</h3>

        <div class="float-sm-end">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><i class="fas fa-plus"></i> Tambah Data</a>
            {{-- modal --}}
{{-- Create Modals --}}
<td>
    <!-- Small modal -->
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Modal demo</button> --}}

    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Tambah Stock In/Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/servis/create" method="post">
                        @csrf
                        <div>
                            <label for="">No Nota</label>
                            <input type="text" name="transaction_code" value="{{$nota}}" class="form-control" readonly>
                        </div>
                        <div>
                            <label for="">Pelanggan</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Telephone</label>
                                    <input type="text" class="form-control" name="telephone" id="telephone" readonly>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" name="address" id="address" readonly>
                                    <input type="hidden" name="id_customer" id="id_customer" class="form-control" readonly>
                                </div>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Unit</label>
                                    <input type="text" name="unit" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="">No Seri</label>
                                    <input type="text" name="serial_number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Keluhan</label>
                                    <input type="text" name="complient" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Kelengkapan</label>
                                    <input type="text" name="completenes" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Pin/passcode</label>
                                    <input type="text" name="passcode" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Catatan khusus</label>
                                    <input type="text" name="notes" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="">Estimasi Biaya</label>
                                <input type="number" name="estimated_cost" class="form-control">
                            </div>
                        </div>
                        <div>
                            <label for="">Status Perbaikan</label>
                            <select class="form-select" name="status" aria-label="Default select example" required="">
                                <option value="">--Pilih--</option>
                                <option value="proses">Proses</option>
                                <option value="waiting sparepart">Menunggu Sparepart</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</td>
{{-- End Create Modals --}}


                    <!-- Large modal -->
                    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" >Modal demo</button> --}}

                    <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Data Pelanggan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="row mt-2">
                                <div class="col-sm-1">
                                    <label>Tambah Data</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="No Telephone">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Nama">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Alamat">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                        </div><hr>

                        <div class="table-responsive">
                                <table class="table table-striped" width="100%" style="font-size: 13px;" id="piutang">
                                    <thead>
                                        <tr>
                                            <th>No Tlp</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($customer as $item)
                                        <tr>
                                            <td>{{$item->telephone}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>
                                                <a href="#" onclick="select_customer({{$item->id}})" class="btn btn-sm btn-warning">Pilih</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


            {{-- end-modal --}}
        </div>
    </div>
    <div class="card-body" style="font-size: 13px;">

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


        <h6>Menampilkan data servis berdasarkan :</h6>
        <div class="row">
            {{-- waktu --}}
            <div class="col-md-5">
                <h6>Waktu :</h6>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                    <label class="form-check-label" for="formRadios1">
                        Semua
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" >
                    <label class="form-check-label" for="formRadios1">
                        Hari ini
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" >
                    <label class="form-check-label" for="formRadios1">
                        <input type="date"> s/d <input type="date">
                    </label>
                </div>
            </div>
            {{-- status --}}
            <div class="col-md-5">
                <h6>Status :</h6>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadios2" id="formRadios2" >
                            <label class="form-check-label" for="formRadios">
                                Dalam Proses
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadios2" id="formRadios2" >
                            <label class="form-check-label" for="formRadios">
                                Menunggu Sparepat
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadios2" id="formRadios2" >
                            <label class="form-check-label" for="formRadios">
                                Selesai
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadios2" id="formRadios2" >
                            <label class="form-check-label" for="formRadios">
                                Dibatalkan
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadios2" id="formRadios2" >
                            <label class="form-check-label" for="formRadios">
                                Sudah Diambil
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadios2" id="formRadios2" checked="">
                            <label class="form-check-label" for="formRadios">
                                Semua
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="stoklimit" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th>aksi</th>
                        <th>Tanggal</th>
                        <th>No Nota</th>
                        <th>Pelanggan</th>
                        <th>Unit</th>
                        <th>No seri</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($service as $item)
                    <tr class="">
                        <td class="text-primary">
                            @if ($item->status == 'proses' or $item->status == 'waiting sparepart')
                            <a href="#"><i class="fas fa-edit"></i></a>
                            <a href="#"><i class="fas fa-money-bill"></i></a>
                            <a href="#"><i class="fas fa-trash-alt"></i></a>
                            @elseif ($item->status == 'cancelled' or $item->status == 'finished')
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                            @elseif ($item->status == 'take')
                            <i class="fas fa-print"></i>
                            @endif
                            <i class="fas fa-search"></i>
                        </td>
                        <td>{{$item->service_date}}</td>
                        <td>{{$item->transaction_code}}</td>
                        <td>{{$item->_customer->name}}</td>
                        <td>{{$item->unit}}</td>
                        <td>{{$item->serial_number}}</td>
                        <td>
                            @if ($item->status == 'proses')

                            <span class="bg-primary badge">Dalam Proses</span>
                            @elseif ($item->status == 'waiting sparepart')

                            <span class="bg-warning badge">Menunggu Sparepat</span>
                            @elseif($item->status == 'finished')

                            <span class="bg-success badge">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('')
{{-- javascript --}}
<script src="{{asset('tmp/javascript/service.js')}}"></script>
@endsection
