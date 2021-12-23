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
                        <input type="number" name="estimated_cost" value="{{$ts->estimated_cost}}" class="form-control">
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-sm btn-primary">Simpan</button>
                    <a href="/admin/servis" class="btn btn-sm btn-danger">Keluar</a>
                </div>
            </form>
        </div>
    </div>
</div>

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
