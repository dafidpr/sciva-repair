@extends('template.layout')
@section('title', 'penjualan')
@section('content')
    <div class="card">
        <div class="card-header bg-white">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" widht="80%" id="stoklimit" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Kasir</th>
                            <th>Customer</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Qty</th>
                            <th>Waktu</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>POS78998787667</td>
                            <td>Administrator</td>
                            <td>Umum</td>
                            <td>0</td>
                            <td>40000</td>
                            <td>40000</td>
                            <td>3</td>
                            <td>2020-09-10 20:45:34</td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary mt-2"><i class="dripicons-document-edit"></i></a>
                                <a href="" class="btn btn-sm btn-success mt-2"><i class="dripicons-print"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
