@extends('template.layout')
@section('title', 'Pembelian')
@section('content')
    <div class="card">
        <div class="card-header bg-white">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" widht="80%" id="stoklimit" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>No Faktur</th>
                            <th>Tgl Faktur</th>
                            <th>Supplaier</th>
                            <th>diskon</th>
                            <th>Qty</th>
                            <th>total</th>
                            <th>payment</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PMB7878767</td>
                            <td>782349867</td>
                            <td>2020-09-21</td>
                            <td>CV.Amanah</td>
                            <td>0</td>
                            <td>1</td>
                            <td>40000</td>
                            <td>cash</td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary mb-2"><i class="dripicons-preview"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
