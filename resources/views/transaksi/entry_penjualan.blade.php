@extends('template.layout')
@section('title', 'Penjualan')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <div class="float-sm-end">
            <h6>Invoice <b>POS786786768778</b></h6>
        </div>
    </div>
    <div class="card-body">
    <h1 class="float-sm-start">Total (RP.)</h1>

    <div class="float-sm-end">
            <h1>0</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div>
                        <label for="">customer</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                    <hr>
                    <div>
                        <label for="">Barcode</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                    <div>
                        <label for="">Barang</label>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" value="Samsung" readonly>
                    </div>
                    <div>
                        <label for="">Harga</label>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" value="2000000" readonly>
                    </div>
                    <div>
                        <label for="">Qty</label>
                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" value="">
                    </div>
                    <button class="btn btn-success mt-3"><i class="dripicons-cart"></i> Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5>Data Barang</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="stoklimit" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>88776767</td>
                                <td>USB</td>
                                <td>50000</td>
                                <td>4</td>
                                <td>20000</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm mt-2"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-danger btn-sm mt-2"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>88776767</td>
                                <td>USB</td>
                                <td>50000</td>
                                <td>4</td>
                                <td>20000</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>88776767</td>
                                <td>USB</td>
                                <td>50000</td>
                                <td>4</td>
                                <td>20000</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>

                <div class="mt-3">
                    <a href="" class="btn btn-danger"><i class="fa fa-recycle m-right-xs""></i> Cancel</a>
                    <a href="" class="btn btn-primary"><i class="fas fa-hand-holding-usd"></i> Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
