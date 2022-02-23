@extends('template.layout')
@section('title', 'Servis')
@section('content')

<div class="card">
    {{-- <div class="card-header bg-white"> --}}


{{-- Create Modals --}}
<td>
    <!-- Small modal -->
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Modal demo</button> --}}

    <div class="modal fade exampleModalScrollable" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Data</h5>
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
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
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
                                    <input type="text" name="passcode" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Catatan khusus</label>
                                    <input type="text" name="notes" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="">Estimasi Biaya</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-estimasi-cost"><i class="fas fa-search"></i></button>
                                <input type="number" name="estimated_cost" id="estimated_cost_total" value="{{old('estimated_cost')}}" class="form-control" required>
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


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


</td>
{{-- End Create Modals --}}


<!-- Large modal -->
<!--  Detaile Customer -->
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
                            <form action="" method="post">
                                @csrf
                            <div class="row mt-2">
                                <div class="col-sm-1">
                                    <label>Tambah Data</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="telephone" id="custelephone" placeholder="No Telephone">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="name" id="cusname" placeholder="Nama">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="address" id="cusaddress" placeholder="Alamat">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" onclick="create_cs_servis()" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                            </form>
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
    {{-- </div> --}}
    <div class="card-body" style="font-size: 13px;">
        <div class="row">
            <div class="col-md-6">
                <h3 class=" mb-4 float-sm-start">Servis</h3>
            </div>
            <div class="col-md-6">
                <div class="float-sm-end">
                    @can('restore-services')
                    <a href="/admin/servis/restore" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Restore Data</a>
                    @endcan
                    @can('create-services')
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".exampleModalScrollable"><i class="fas fa-plus"></i> Tambah Data</a>
                    @endcan
                    {{-- <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_print_sm_check"><i class="fas fa-plus"></i> Tambah Data</a> --}}
                    {{-- modal --}}
                </div>
            </div>
        </div>

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
        <form action="/admin/servis/filter" method="post">
            @csrf
        <div class="row">
            {{-- waktu --}}
            <div class="col-md-5">
                <h6>Waktu :</h6>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="time" id="all-time" value="all" @if ($time == 'all') checked="" @endif>
                    <label class="form-check-label" for="all-time">
                        Semua
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="time" id="time-today" value="now" @if ($time == 'now') checked="" @endif>
                    <label class="form-check-label" for="time-today">
                        Hari ini
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="time" id="time-range" value="range" @if ($time == 'range') checked="" @endif>
                    <label class="form-check-label" for="time-range">
                        <input type="date" class="form-control-sm" name="from"> s/d <input type="date" class="form-control-sm" name="to">
                    </label>
                </div>
            </div>
            {{-- status --}}
            <div class="col-md-5">
                <h6>Status :</h6>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="proses" id="status-proses" value="proses" @if ($proses == true) checked="" @endif>
                            <label class="form-check-label" for="status-proses">
                                Dalam Proses
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="status-ws" name="waiting_sparepart" value="waiting sparepart" @if ($waiting_sparepart == true) checked="" @endif>
                            <label class="form-check-label" for="status-ws">
                                Menunggu Sparepat
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="finished" id="finished" value="finished" @if ($finished == true) checked="" @endif>
                            <label class="form-check-label" for="finished">
                                Selesai
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="cancelled" id="status-batal" value="cancelled" @if ($cancelled
                            == true) checked="" @endif>
                            <label class="form-check-label" for="status-batal">
                                Dibatalkan
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="take" id="status-take" value="take" @if ($take == true) checked="" @endif>
                            <label class="form-check-label" for="status-take">
                                Sudah Diambil
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="semua-status" name="all_status" value="all_status" @if ($all_status == 'all_status') checked="" @endif>
                            <label class="form-check-label" for="semua-status">
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
    </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="sortServis" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No Nota</th>
                        <th>Pelanggan</th>
                        <th>Unit</th>
                        <th>No seri</th>
                        <th>Status</th>
                        @canany(['update-services', 'call-services', 'take-services', 'printNota-services', 'delete-services', 'detail-services'])
                        <th>aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($service as $item)
                    <?php
                    $kode = $item->transaction_code;
                    ?>
                    <tr class="">
                        <td>{{$item->service_date}}</td>
                        <td>{{$item->transaction_code}}</td>
                        <td>{{$item->_customer->name}}</td>
                        <td>{{$item->unit}}</td>
                        <td>{{$item->serial_number}}</td>
                        <td>
                            @if ($item->status == 'proses')

                            <span class="bg-primary badge" style="font-size: 13px;">Dalam Proses</span>
                            @elseif ($item->status == 'waiting sparepart')

                            <span class="bg-warning badge" style="font-size: 13px;">Menunggu Sparepat</span>
                            @elseif($item->status == 'finished')

                            <span class="bg-success badge" style="font-size: 13px;">Selesai</span>
                            @elseif($item->status == 'cancelled')

                            <span class="bg-danger badge" style="font-size: 13px;">Dibatalkan</span>
                            @elseif($item->status == 'take')

                            <span class="bg-secondary badge" style="font-size: 13px;">Sudah diambil</span>
                            @endif
                        </td>
                        @canany(['update-services', 'call-services', 'take-services', 'printNota-services', 'delete-services', 'detail-services'])
                        <td class="text-primary">
                            @if ($item->status == 'proses' or $item->status == 'waiting sparepart')
                            @can('update-services')
                            <a href="/admin/servis/{{$item->id}}/edit" class="ms-2"><i class="fas fa-edit"></i></a>
                            <a href="#" onclick="hargaService(`{{$item->_customer->name}}`, {{$item->id}})" class="ms-2"><i class="fas fa-money-bill"></i></a>
                            @endcan

                            @can('printNota-services')
                            <a href="#" target="" onclick="ser_masuk({{$item->id}})" class="ms-2"><i class="fas fa-print"></i></a>
                            @endcan

                            @elseif ($item->status == 'cancelled' or $item->status == 'finished')

                            @can('call-services')
                            <a href="#" onclick="modCall({{$item->_customer->telephone}}, '{{$item->transaction_code}}', '{{$item->status}}', '{{number_format($item->total)}}')" class="ms-2"><i class="fab fa-whatsapp"></i></a>
                            @endcan

                            @can('printNota-services')
                            <a href="#" target="" onclick="ser_masuk({{$item->id}})" class="ms-2"><i class="fas fa-print"></i></a>
                            @endcan

                            @can('take-services')
                            <a href="#" onclick="takeUnit(`{{$item->_customer->name}}`, {{$item->id}})" class="ms-2"><i class="fas fa-shopping-cart"></i></a>
                            @endcan

                            @elseif ($item->status == 'take')
                            @can('printNota-services')
                            <a href="#" onclick="ser_take({{$item->id}})" class="ms-2"><i class="fas fa-print"></i></a>
                            @endcan
                            @endif
                            @can('delete-services')
                            <a href="#" onclick="softDelete({{$item->id}})" class="ms-2"><i class="fas fa-trash-alt"></i></a>
                            @endcan
                            <?php if($item->technician == null){ $techni = '-'; }else{$techni = $item->_teknisi->name;} ?>
                            @can('detail-services')
                            <a href="#" id="detail_btn_service" onclick="detail_service({{$item->id}}, '{{$item->_customer->name}}', '{{$item->_customer->telephone}}', '{{$item->_customer->address}}', '{{$techni}}', '{{$item->_user->name}}')" class="ms-2">
                                <i class="fas fa-search"></i>
                            </a>
                            @endcan
                        </td>
                        @endcanany
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



{{-- Modal Edit Status Service --}}
<div class="modal fade editStatusService" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Harga Servis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/servis/serviceSelesai" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">No Nota</label>
                            <input type="text" name="transaction_code" id="transaction_code" class="form-control" readonly>
                            <input type="hidden" name="transaction_id" id="transaction_id" class="form-control" readonly>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Pelanggan</label>
                                <input type="text" class="form-control" name="name" id="name_customer" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="">Unit</label>
                                <input type="text" name="unit" id="unit" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="">Keluhan</label>
                                <input type="text" name="complient" id="complient" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="">Estimasi Biaya</label>
                            <input type="number" name="estimated_cost" id="estimated_cost" class="form-control" readonly>

                        </div>
                    </div>

                    <div class="">
                        <div class="mb-3">
                            <label class="control-label">Teknisi</label>

                            <select class="select2 form-control select2-multiple" name="technician"  id="technician" style="width: 100%;"
                              data-placeholder="Pilih Teknisi" required>
                              <option value=""  data-price="0">-pilih-</option>
                                @foreach ($user as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <label class="control-label">Jasa</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-modal-lg-js"><i class="fas fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Name Jasa</label>
                            <input type="text" class="form-control" name="jasa_name" id="jasa_name" readonly>
                            <input type="hidden" class="form-control" name="jasa_id" id="jasa_id" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Harga (Rp.)</label>
                            <input type="number" class="form-control" name="jasa_price" id="jasa_price" readonly>
                        </div>
                        <div class="mt-3">
                            <button type="button" onclick="tambahJasaService()" class="btn btn-sm btn-success">Tambah</button>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-bordered" width="100%" id="jasa_servis_op" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_jasa_servis_op">

                        </tbody>
                    </table>

                    <hr>
                    <div class="">
                        <div class="mb-3">
                            <label class="control-label">Sparepart</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-modal-sparepart"><i class="fas fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">item</label>
                            <input type="text" class="form-control" name="item_product" id="item_product" readonly>
                            <input type="hidden" class="form-control" name="item_product" id="id_product" readonly>
                        </div>

                        <div class="col-sm-6">
                            <label for="">Harga (Rp.)</label>
                            <input type="number" class="form-control" name="item_price" id="item_price" readonly>

                        </div>
                        <div class="col-sm-6">
                            <label for="">qty</label>
                            <input type="text" class="form-control" name="qty_prod" id="qty_prod">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Diskon (Rp.)</label>
                            <input type="number" class="form-control" value="0" name="discount" id="discount_prod">
                        </div>
                        <div class="mt-3">
                            <button type="button" onclick="tambahSparepartService()" class="btn btn-sm btn-success">Tambah</button>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-bordered" width="100%" id="table_sparepart" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Diskon</th>
                                <th>Subtotal</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_sparepart">

                        </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Total Sparepart</label>
                            <input type="number" class="form-control" name="subtot_prod" value="0" id="subtot_prod" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Total jasa</label>
                            <input type="text" class="form-control" name="subtot_jasa" value="0" id="subtot_jasa" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Diskon (Rp.)</label>
                            <input type="text" class="form-control" name="total_discount" value="0" id="total_discount" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Total Harga (Rp.)</label>
                            <input type="number" class="form-control" name="sub_total" id="sub_total" readonly required>
                        </div>

                    </div>

                <div class="modal-footer">
                    <button type="button" onmousemove="sum()" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <a href="#" onclick="batalData()" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</a>
                    <button type="submit" onmousemove="sum()" class="btn btn-primary">Selesai</button>
                </div>
            </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


{{-- End Modal Edit Status Service --}}
{{-- Detail Modal --}}
<div class="modal fade" id="DetailModals" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <td><b>Tanggal Servis</b></td>
                            <td><span id="dtgl_servis"></span></td>
                        </tr>
                        <tr>
                            <td><b>No. Nota</b></td>
                            <td><span id="dnota"></span></td>
                        </tr>
                        <tr>
                            <td><b>Pelanggan</b></td>
                            <td><span id="dcustomers"></span></td>
                        </tr>
                        <tr>
                            <td><b>Alamat Pelanggan</b></td>
                            <td><span id="dalamat"></span></td>
                        </tr>
                        <tr>
                            <td><b>No Handphone</b></td>
                            <td><span id="dtelephone"></span></td>
                        </tr>
                        <tr>
                            <td><b>Unit</b></td>
                            <td><span id="dunit"></span></td>
                        </tr>
                        <tr>
                            <td><b>No. Seri</b></td>
                            <td><span id="dseri"></span></td>
                        </tr>
                        <tr>
                            <td><b>Passcode</b></td>
                            <td><span id="dpasscode"></span></td>
                        </tr>
                        <tr>
                            <td><b>Keluhan</b></td>
                            <td><span id="dcomplient"></span></td>
                        </tr>
                        <tr>
                            <td><b>Kelengkapan</b></td>
                            <td><span id="dcompletenes"></span></td>
                        </tr>
                        <tr>
                            <td><b>Catatan Khusus</b></td>
                            <td><span id="dnotes"></span></td>
                        </tr>
                        <tr>
                            <td><b>Biaya</b></td>
                            <td><span id="dtotal"></span></td>
                        </tr>
                        <tr>
                            <td><b>Status Perbaikan</b></td>
                            <td><span id="dstatus"></span></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Pengambilan</b></td>
                            <td><span id="dtake"></span></td>
                        </tr>
                        <tr>
                            <td><b>Operator</b></td>
                            <td><span id="doperator"></span></td>
                        </tr>
                        <tr>
                            <td><b>Teknisi</b></td>
                            <td><span id="dteknisi"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Detail Modal --}}
{{-- Payment Servis --}}

<div class="modal fade takeUnit" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Pengambilan Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/servis/takeUnit" method="post">
                    @csrf
                    <div>
                        <label for="">No Nota</label>
                        <input type="text" class="form-control" name="transaction_code" id="t_transaction_code" readonly>
                        <input type="hidden" class="form-control" name="id_sv" id="t_sv" readonly>
                    </div>
                    <div>
                        <label for="">Pelanggan</label>
                        <input type="text" class="form-control" name="customer" id="t_customer" readonly>
                    </div>
                    <div>
                        <label for="">Unit</label>
                        <input type="text" class="form-control" name="unit" id="t_unit" readonly>
                    </div>
                    <div>
                        <label for="">No Seri</label>
                        <input type="text" class="form-control" name="serial_number" id="t_serial_number" readonly>
                    </div>
                    <div>
                        <label for="">Total Biaya</label>
                        <input type="number" class="form-control" name="total" id="t_total" readonly>
                    </div>
                    <div>
                        <label>Payment Method</label>
                        <br>
                        <input type="radio" name="method" class="meth" value="cash" checked> <label for="">Cash</label>
                        <input type="radio" name="method" class="meth" value="credit"> <label for="">Credit</label>
                    </div>
                    <div id="form_duedate">
                        <label for="">Jatuh Tempo</label>
                        <input type="date" class="form-control" name="due_date" id="due_date">
                    </div>
                    <div>
                        <label for="">Bayar</label>
                        <input type="number" onkeyup="es_cashback()" class="form-control" name="payment" id="t_payment" required>
                    </div>
                    <div>
                        <label for="">Kembalian</label>
                        <input type="number" class="form-control" name="cashback" id="t_cashback" readonly>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Payment Servis --}}
{{-- Modal Call Customer --}}
<div class="modal fade" id="callcustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Hubungi Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center" id="call_cs">
            {{-- <div class="row">
                <div class="col-sm-4">
                    <a href="#"><i class="fab fa-whatsapp-square fa-10x"></i></a>
                </div>
                <div class="col-sm-4">
                    <a href="#"><i class="fas fa-envelope-square fa-10x"></i></a>
                </div>
                <div class="col-sm-4">
                    <a href="#"><i class="fas fa-phone-square-alt fa-10x"></i></a>
                </div>
            </div> --}}
        </div>
      </div>
    </div>
  </div>
{{-- End Modal Call Customer --}}


{{-- Modal Jasa --}}
<div class="modal fade bs-modal-lg-js" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Pilih Jasa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" width="100%" style="font-size: 13px" id="pilihjasa">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th style="width: 10%;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($repaire as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->price)}}</td>
                                <td>
                                    <button onclick="pilih_jasa_servis({{$item->id}})" class="btn btn-sm btn-success">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End modal Jasa --}}

{{-- Modal Sparepart --}}
<div class="modal fade bs-modal-sparepart" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Pilih Sparepart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table responsive">
                    <table class="table table-striped" id="pilihProduct" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <td>{{$item->barcode}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->selling_price)}}</td>
                                <td>{{$item->stock}}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="pilih_sparepart_servis({{$item->id}})">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal Sparepart --}}


{{-- Modal for choose estimated chost --}}
<div class="modal fade bs-estimasi-cost" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Estimasi Biaya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">

                <div class="">
                    <div class="mb-3">
                        <label class="control-label">Jasa</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".ec_bs-modal-lg-js"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Name Jasa</label>
                        <input type="text" class="form-control" name="jasa_name" id="ec_jasa_name" readonly>
                        <input type="hidden" class="form-control" name="jasa_id" id="ec_jasa_id" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Harga (Rp.)</label>
                        <input type="number" class="form-control" name="jasa_price" id="ec_jasa_price" readonly>
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="ec_tambahJasaService()" class="btn btn-sm btn-success">Tambah</button>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered" width="100%" id="ec_jasa_servis_op" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="ec_tbody_jasa_servis_op">

                    </tbody>
                </table>

                <hr>
                <div class="">
                    <div class="mb-3">
                        <label class="control-label">Sparepart</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".ec_bs-modal-sparepart"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">item</label>
                        <input type="text" class="form-control" name="item_product" id="ec_item_product" readonly>
                        <input type="hidden" class="form-control" name="item_product" id="ec_id_product" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label for="">Harga (Rp.)</label>
                        <input type="number" class="form-control" name="item_price" id="ec_item_price" readonly>

                    </div>
                    <div class="col-sm-6">
                        <label for="">qty</label>
                        <input type="text" class="form-control" name="qty_prod" id="ec_qty_prod">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Diskon (Rp.)</label>
                        <input type="number" class="form-control" value="0" name="discount" id="ec_discount_prod">
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="ec_tambahSparepartService()" class="btn btn-sm btn-success">Tambah</button>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered" width="100%" id="ec_table_sparepart" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Diskon</th>
                            <th>Subtotal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="ec_tbody_sparepart">

                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Total Sparepart</label>
                        <input type="number" class="form-control" name="subtot_prod" value="0" id="ec_subtot_prod" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Total jasa</label>
                        <input type="text" class="form-control" name="subtot_jasa" value="0" id="ec_subtot_jasa" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Diskon (Rp.)</label>
                        <input type="text" class="form-control" name="total_discount" value="0" id="ec_total_discount" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Total Harga (Rp.)</label>
                        <input type="number" class="form-control" name="sub_total" id="ec_sub_total" readonly required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" onclick="estimate_cost_choose()" class="btn btn-primary">Save changes</button>
                    </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal --}}


{{-- Modal Jasa --}}
<div class="modal fade ec_bs-modal-lg-js" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Pilih Jasa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" width="100%" style="font-size: 13px" id="pilihjasa2">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th style="width: 10%;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($repaire as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->price)}}</td>
                                <td>
                                    <button onclick="ec_pilih_jasa_servis({{$item->id}})" class="btn btn-sm btn-success">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End modal Jasa --}}

{{-- Modal Sparepart --}}
<div class="modal fade ec_bs-modal-sparepart" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Pilih Sparepart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table responsive">
                    <table class="table table-striped" id="pilihProduct2" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <td>{{$item->barcode}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->selling_price)}}</td>
                                <td>{{$item->stock}}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="ec_pilih_sparepart_servis({{$item->id}})">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal Sparepart --}}


<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
    function ser_take(id){
        // window.open("/admin/servis/print_take/"+id, '_blank');
        document.getElementById('buttonToPrint').innerHTML = `<div class="row"><div class="col-md-6"><a href="/admin/servis/print_take/${id}" style="width: 100%;" target="_blank" class="btn btn-primary btn-block">Termal</a></div><div class="col-md-6"><a href="/admin/servis/print_take_epson/${id}" style="width: 100%;"class="btn btn-secondary btn-block">Epson</a></div></div>`
            $('#modal_print_sm_check').modal('show');
    }
    function ser_masuk(id){
        // window.open("/admin/servis/service_masuk/"+id, '_blank');
        document.getElementById('buttonToPrint').innerHTML = `<div class="row"><div class="col-md-6"><a href="/admin/servis/service_masuk/${id}" style="width: 100%;" target="_blank" class="btn btn-primary btn-block">Termal</a></div><div class="col-md-6"><a href="/admin/servis/service_masuk_epson/${id}" style="width: 100%;"class="btn btn-secondary btn-block">Epson</a></div></div>`
            $('#modal_print_sm_check').modal('show');
    }
</script>
@endsection
@section('modal_section')
{{-- Modal print sm --}}
<td>
    <div id="modal_print_sm_check" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Cetak Print</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="font-size-16 text-center">Pilih Untuk Cetak Print!!</h5>
                    <div id="buttonToPrint">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="/admin/servis/service_masuk/{{old('print_s_masuk')}}" style="width: 100%;" target="_blank" class="btn btn-primary btn-block">Termal</a>
                            </div>
                            <div class="col-md-6">
                                <a href="/admin/servis/service_masuk_epson/{{old('print_s_masuk')}}" style="width: 100%;"class="btn btn-secondary btn-block">Epson</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</td>
@endsection
@section('c_print')
@if (old('print_s_masuk'))
<script>
    $(window).on('load',function(){
        $('#modal_print_sm_check').modal('show');
    });
</script>
@endif
@if (old('print_s_diambil'))
<script>
    ct_print_st(<?php echo old('print_s_diambil');?>)
</script>
@endif
@endsection
