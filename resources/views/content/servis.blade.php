@extends('template.layout')
@section('title', 'Servis')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <h3 class=" mb-4 float-sm-start">Servis</h3>

        <div class="float-sm-end">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><i class="fas fa-plus"></i> Tambah Data</a>
            {{-- modal --}}
                <!-- Small modal -->
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Scrollable Modal</h5>
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
                                            <button class="btn btn-primary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i class="fas fa-search"></i></button>
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <td>
                    <!-- Small modal -->
                    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" >Modal demo</button> --}}

                    <div class="modal fade bs-example-modal-center" tabindex="-1" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0">Center modal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Cras mattis consectetur purus sit amet fermentum.
                                        Cras justo odio, dapibus ac facilisis in,
                                        egestas eget quam. Morbi leo risus, porta ac
                                        consectetur ac, vestibulum at eros.</p>
                                    <p>Praesent commodo cursus magna, vel scelerisque
                                        nisl consectetur et. Vivamus sagittis lacus vel
                                        augue laoreet rutrum faucibus dolor auctor.</p>
                                    <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                                        Praesent commodo cursus magna, vel scelerisque
                                        nisl consectetur et. Donec sed odio dui. Donec
                                        ullamcorper nulla non metus auctor
                                        fringilla.</p>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </td>


            {{-- end-modal --}}
        </div>
    </div>
    <div class="card-body" style="font-size: 13px;">
        <h6>Menampilkan data servis berdasarkan :</h6>
        <div class="row">
            {{-- waktu --}}
            <div class="col-sm-6">
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
            <div class="col-sm-6">
                <h6>Status :</h6>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios2" id="formRadios2" >
                    <label class="form-check-label" for="formRadios">
                        Dalam Proses
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios2" id="formRadios2" >
                    <label class="form-check-label" for="formRadios">
                        Menunggu Sparepat
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios2" id="formRadios2" >
                    <label class="form-check-label" for="formRadios">
                        Selesai
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios2" id="formRadios2" >
                    <label class="form-check-label" for="formRadios">
                        Dibatalkan
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios2" id="formRadios2" >
                    <label class="form-check-label" for="formRadios">
                        Sudah Diambil
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="formRadios2" id="formRadios2" checked="">
                    <label class="form-check-label" for="formRadios">
                        Semua
                    </label>
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
