@extends('template.layout')
@section('title', 'Servis')
@section('content')

<div class="">
    <div class="card">
        {{-- <div class="card-header bg-white">
        </div> --}}
        <div class="card-body">
            <h3 class=" mb-4">Edit Servis</h3>
            <form action="/admin/servis/{{$ts->id}}/update" method="post">
                @csrf
                <div>
                    <label for="">No Nota</label>
                    <input type="text" name="transaction_code" value="{{$ts->transaction_code}}" class="form-control" readonly>
                </div>
                <div>
                    <label for="">Pelanggan</label>
                    <div class="input-group mb-3">
                        <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-search"></i></button>
                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" value="{{$ts->_customer->name}}" class="form-control" readonly>
                        <input type="hidden" name="customer_id" value="{{$ts->customer_id}}" id="id_customer" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="">Telephone</label>
                        <input type="text" name="telephone" value="{{$ts->_customer->telephone}}" id="telephone" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="">Unit</label>
                        <input type="text" name="unit" value="{{$ts->unit}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">No Seri</label>
                        <input type="text" name="serial_number" value="{{$ts->serial_number}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Keluhan</label>
                        <input type="text" name="complient" value="{{$ts->complient}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Kelengkapan</label>
                        <input type="text" name="completenes" value="{{$ts->completenes}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Passcode</label>
                        <input type="text" name="passcode" value="{{$ts->passcode}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Catatan</label>
                        <input type="text" name="notes" value="{{$ts->notes}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Estimasi Biaya</label>
                        <input type="number" name="estimated_cost" value="{{($ts->estimated_cost+0)}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Status Perbaikan</label>
                        <select class="form-select" name="status" aria-label="Default select example" required="">
                            <option value="{{$ts->status}}">@if ($ts->status == 'proses') Proses @elseif($ts->status == 'waiting sparepart') Menunggu Sparepart @elseif($ts->status == 'finished') Selesai @elseif($ts->status == 'cancelled') Dibatalkan @elseif($ts->status == 'take') Diambil @endif</option>
                            <option value="proses">Proses</option>
                            <option value="waiting sparepart">Menunggu Sparepart</option>
                            <option value="finished">Selesai</option>
                            <option value="cancelled">Dibatalkan</option>
                            <option value="take">Diambil</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-sm btn-primary">Simpan</button>
                    <a href="/admin/servis" class="btn btn-sm btn-danger">Keluar</a>
                    {{-- <a href="/admin/servis" class="btn btn-sm btn-primary">Tambah Jasa & Sparepart</a> --}}
                </div>
            </form>
            <hr>
            <div>
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
                        <button type="button"  class="btn btn-sm btn-success">Tambah</button>
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
                        @foreach ($repaire_id as $l)
                        @if ($l->sparepart_id == null)
                        <tr>
                            <td>{{$l->_repaire->name}}</td>
                            <td>Rp. {{number_format($l->_repaire->price)}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
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
                        <input type="hidden" class="form-control" name="item_hpp" id="item_hpp" readonly>

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
                        <button type="button" class="btn btn-sm btn-success">Tambah</button>
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
                        @foreach ($sparepart_id as $item)
                        @if ($item->repaire_id == null)
                        <tr>
                            <td>{{$item->_product->name}}</td>
                            <td>Rp. {{number_format($item->total)}}</td>
                            <td>{{$item->qty}}</td>
                            <td>Rp. {{number_format($item->discount)}}</td>
                            <td>Rp. {{number_format($item->sub_total)}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
                                    @if ($item->stock == 0)
                                    <button class="btn btn-sm btn-primary" disabled="disabled" onclick="">Pilih</button>

                                    @else
                                    <button class="btn btn-sm btn-primary" onclick="pilih_sparepart_servis({{$item->id}})">Pilih</button>
                                    @endif
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


@endsection
