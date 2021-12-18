@extends('template.layout')
@section('title', 'Servis')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <h3 class=" mb-4 float-sm-start">Servis</h3>

        <div class="float-sm-end">
            <a href="/admin/servis/restore" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Restore Data</a>
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
                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Tambah Service</h5>
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
                                <input type="number" name="estimated_cost" value="{{old('estimated_cost')}}" class="form-control">
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
                            <form action="/admin/servis/create_customer" method="post">
                                @csrf
                            <div class="row mt-2">
                                <div class="col-sm-1">
                                    <label>Tambah Data</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="telephone" placeholder="No Telephone">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="name" placeholder="Nama">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="address" placeholder="Alamat">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
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
        <form action="/admin/servis/filter" method="post">
            @csrf
        <div class="row">
            {{-- waktu --}}
            <div class="col-md-5">
                <h6>Waktu :</h6>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="time" value="all" checked="">
                    <label class="form-check-label">
                        Semua
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="time" value="now">
                    <label class="form-check-label">
                        Hari ini
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="time" value="range">
                    <label class="form-check-label">
                        <input type="date" name="from"> s/d <input type="date" name="to">
                    </label>
                </div>
            </div>
            {{-- status --}}
            <div class="col-md-5">
                <h6>Status :</h6>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="proses" value="proses">
                            <label class="form-check-label">
                                Dalam Proses
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="waiting_sparepart" value="waiting_sparepart">
                            <label class="form-check-label">
                                Menunggu Sparepat
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="finished" value="finished">
                            <label class="form-check-label">
                                Selesai
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="cancelled" value="cancelled">
                            <label class="form-check-label">
                                Dibatalkan
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="take" value="take">
                            <label class="form-check-label">
                                Sudah Diambil
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="all_status" value="all_status" checked="">
                            <label class="form-check-label">
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
                            <a href="/admin/servis/{{$item->id}}/edit"><i class="fas fa-edit"></i></a>
                            <a href="#" onclick="hargaService(`{{$item->_customer->name}}`, {{$item->id}})"><i class="fas fa-money-bill"></i></a>
                            @elseif ($item->status == 'cancelled' or $item->status == 'finished')
                            <a href="#" onclick="modCall()"><i class="fab fa-whatsapp"></i></a>
                            <a href="#" onclick="takeUnit(`{{$item->_customer->name}}`, {{$item->id}})"><i class="fas fa-shopping-cart"></i></a>
                            @elseif ($item->status == 'take')
                            <a href="/admin/servis/print_take/{{$item->id}}" target="_blank"><i class="fas fa-print"></i></a>
                            @endif
                            <a href="#" onclick="softDelete({{$item->id}})"><i class="fas fa-trash-alt"></i></a>
                            <a href="#" id="detail_btn_service" onclick="detail_service({{$item->id}})" data-customer="{{$item->_customer->name}}" data-telephone="{{$item->_customer->telephone}}">
                                <i class="fas fa-search"></i>
                            </a>
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
                            @elseif($item->status == 'cancelled')

                            <span class="bg-danger badge">Batal</span>
                            @elseif($item->status == 'take')

                            <span class="bg-secondary badge">Sudah diambil</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- Modal Edit Status Service --}}
<div class="modal fade" id="editStatusService" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Harga Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/servis/serviceSelesai" method="post">
                    @csrf
                    <div>
                        <label for="">No Nota</label>
                        <input type="text" name="transaction_code" id="transaction_code" class="form-control" readonly>
                        <input type="hidden" name="transaction_id" id="transaction_id" class="form-control" readonly>
                    </div>
                    <div class="row">
                        <div class="">
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
                              data-placeholder="Pilih Teknisi">
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

                            <select class="select2 form-control select2-multiple" multiple="multiple" name="jasa[]"  id="jasa" style="width: 100%;"
                              data-placeholder="Pilih Jasa....">
                              {{-- <option value=""  data-price="0">-pilih-</option> --}}
                                @foreach ($repaire as $item)
                                <option value="{{$item->id}}"  data-price="{{$item->price}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="">
                        <div class="mb-3">
                            <label class="control-label">Sparepart</label>

                            <select class="select2 form-control select2-multiple" multiple="multiple" name="sparepart[]"  id="sparepart" style="width: 100%;" data-placeholder="Pilih Sparepart....">
                                {{-- <option value="" data-selling_price="0">-pilih-</option> --}}
                                @foreach ($product as $item)
                                <option value="{{$item->id}}" data-selling_price="{{$item->selling_price}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="">Diskon (Rp.)</label>
                        <input type="number" class="form-control" name="discount" id="discount">
                    </div>
                    <div>
                        <label for="">Total Harga (Rp.)</label>
                        <input type="number" class="form-control" name="sub_total" id="sub_total" readonly>
                        <input type="hidden" class="form-control" name="total" id="total" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onmousemove="sum()" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <a href="#" onclick="batalData()" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</a>
                    <button type="submit" onmousemove="sum()" class="btn btn-primary">Selesai</button>
                </div>
            </form>
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
                            <td><b>Nota</b></td>
                            <td>:</td>
                            <td><span id="dnota"></span></td>
                        </tr>
                        <tr>
                            <td><b>Telephone</b></td>
                            <td>:</td>
                            <td><span id="dtelephone"></span></td>
                        </tr>
                        <tr>
                            <td><b>Pelanggan</b></td>
                            <td>:</td>
                            <td><span id="dcustomers"></span></td>
                        </tr>
                        <tr>
                            <td><b>Unit</b></td>
                            <td>:</td>
                            <td><span id="dunit"></span></td>
                        </tr>
                        <tr>
                            <td><b>Seri</b></td>
                            <td>:</td>
                            <td><span id="dseri"></span></td>
                        </tr>
                        <tr>
                            <td><b>Keluhan</b></td>
                            <td>:</td>
                            <td><span id="dcomplient"></span></td>
                        </tr>
                        <tr>
                            <td><b>Kelengkapan</b></td>
                            <td>:</td>
                            <td><span id="dcompletenes"></span></td>
                        </tr>
                        <tr>
                            <td><b>Passcode</b></td>
                            <td>:</td>
                            <td><span id="dpasscode"></span></td>
                        </tr>
                        <tr>
                            <td><b>Catatan Khusus</b></td>
                            <td>:</td>
                            <td><span id="dnotes"></span></td>
                        </tr>
                        <tr>
                            <td><b>Estimasi Biaya</b></td>
                            <td>:</td>
                            <td><span id="destimated_cost"></span></td>
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
<div class="modal fade" id="takeUnit" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="takeUnit">Pengambilan Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/servis/takeUnit" method="post">
                    @csrf
                    <div>
                        <label for="">No Nota</label>
                        <input type="text" class="form-control" name="transaction_code" id="t_transaction_code" readonly>
                        <input type="text" class="form-control" name="id_sv" id="t_sv" readonly>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
        <div class="modal-body text-center">
            <div class="row">
                <div class="col-sm-4">
                    <a href="#"><i class="fab fa-whatsapp-square fa-10x"></i></a>
                </div>
                <div class="col-sm-4">
                    <a href="#"><i class="fas fa-envelope-square fa-10x"></i></a>
                </div>
                <div class="col-sm-4">
                    <a href="#"><i class="fas fa-phone-square-alt fa-10x"></i></a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
{{-- End Modal Call Customer --}}


<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
@endsection
