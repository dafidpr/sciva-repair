@extends('template.layout')
@section('title', 'Barcode')
@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="stoklimit" style="font-size:13px;">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BR-00001</td>
                                <td>98273489</td>
                                <td>Oppo Reno 3</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div>
                        <label for="">Kode</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div>
                        <label for="">BarcodeID (EAN13)</label>
                        <input type="text" class="form-control">
                    </div>
                    <div>
                        <label for="">Nama</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="mt-3">
                        <a href="" class="btn btn-sm btn-primary">Cetak</a>
                        <a href="" class="btn btn-sm btn-primary">Generate</a>
                        <a href="" class="btn btn-sm btn-warning">Update Barcode</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h6>View Barcode</h6>
            </div>
        </div>
    </div>
</div>

@endsection
