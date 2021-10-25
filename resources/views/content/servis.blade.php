@extends('template.layout')
@section('title', 'Servis')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <h3 class=" mb-4 float-sm-start">Servis</h3>

        <div class="float-sm-end">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i> Tambah Data</a>
            {{-- modal --}}



            <td>
                {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" >Modal demo</button> --}}
                <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    @csrf
                                    <div>
                                        <label for="">No Nota</label>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                    <div>
                                        <label for="">Pelanggan</label>
                                        <div class="input-group mb-3">
                                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-search"></i></button>
                                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        </div>
                                    </div>
                                    <div>
                                        <table class="table">
                                            <tr>
                                                <th>Nama</th>
                                                <td>:</td>
                                                <td>Riki Harun</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>:</td>
                                                <td>Rogojampi</td>
                                            </tr>
                                            <tr>
                                                <th>No HP</th>
                                                <td>:</td>
                                                <td>08765897621</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div>
                                                <label for="">Unit</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <label for="">No Seri</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <label for="">Keluhan</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <label for="">Kelengkapan</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <label for="">Pin/passcode</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <label for="">Catatan khusus</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="">Estimasi Biaya</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                    <div>
                                        <label for="">Status Perbaikan</label>
                                        <input type="text" class="form-control" >
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </td>


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
                                                <tr>
                                                    <td>0883743849</td>
                                                    <td>Fitriyansyah</td>
                                                    <td>Banyuwangi</td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-warning">Pilih</a>
                                                    </td>
                                                </tr>
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
        <h6>Menampilkan data servis berdasarkan :</h6>
        <div class="row">
            {{-- waktu --}}
            <div class="col-md-6">
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
            <div class="col-md-6">
                <h6>Status :</h6>
                <div class="row">
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
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
                    <tr class="">
                        <td class="text-primary">
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-money-bill"></i>
                            <i class="fas fa-search"></i>
                            <i class="fas fa-trash-alt"></i>
                        </td>
                        <td>10-09-2021</td>
                        <td>SCR-00001</td>
                        <td>Ahmadina</td>
                        <td>Samsung galaxy</td>
                        <td>66488657790008876</td>
                        <td><span class="bg-primary badge">Dalam Proses</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
