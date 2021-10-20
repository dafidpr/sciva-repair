@extends('template.layout')
@section('title', 'Pembelian')
@section('content')

<div class="card">
    <div class="card-header bg-white">

    </div>
    <div class="card-body">
        <form action="">
        <div class="row">
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="">Tgl Faktur</label>
                    <input type="date" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">No Faktur</label>
                    <input type="text" class="form-control">
                </div>
                <div>
                    <label for="">Supplier</label>
                    <div class="input-group mb-3">
                        <button class="btn btn-primary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div>
                    <label for="">Barcode</label>
                    <div class="input-group mb-3">
                        <button class="btn btn-primary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Qty</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="">Operator</label>
                    <input type="text" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="">Harga Beli</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Harga Jual</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div>
            <a href="" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Total</th>
                        <th>Qty</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>9792342938</td>
                        <td>Battery</td>
                        <td>47000</td>
                        <td>50000</td>
                        <td>100000</td>
                        <td>2</td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Diskon (Rp.)</label>
                    <input type="text" class="form-control">
                </div>
                <div>
                    <span class="text-danger" style="font-size: 11px;">Note : Diskon disini merupakan diskon keseluruhan dari pembelian. Jika diskon di nota adalah diskon per satuan, maka harap dijumlahkan secara keseluruhan.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <h2 class="float-sm-start">Total (Rp.)</h2>
                <div class="float-sm-end">
                    <h2>0</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="float-sm-end">
                    <a href="" class="btn btn-danger"><i class="fa fa-recycle m-right-xs""></i> Cancel</a>
                    <a href="" class="btn btn-Primary"><i class="fas fa-hand-holding-usd"></i> Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
