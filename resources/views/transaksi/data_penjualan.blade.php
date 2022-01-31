@extends('template.layout')
@section('title', 'Penjualan')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" width="100%" id="stoklimit" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Kasir</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Tipe</th>
                            <th>Bayar</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sale as $item)
                        <tr>
                            <td>{{$item->invoice}}</td>
                            <td>{{$item->_user->name}}</td>
                            <td>{{$item->_customer->name}}</td>
                            <td>{{number_format($item->total)}}</td>
                            <td>{{$item->method}}</td>
                            <td>{{number_format($item->payment)}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                @can('detail-sales')
                                <a href="/admin/daftar_penjualan/show/{{$item->id}}" class="btn btn-sm btn-primary mb-2"><i class="dripicons-preview"></i></a>
                                @endcan
                                @can('print-sales')
                                <a href="#" onclick="print_sale_a({{$item->id}})" class="btn btn-sm btn-success mb-2"><i class="dripicons-print"></i></a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




<script type="text/javascript" src="{{asset('demo/js/qz-tray.js')}}"></script>
<script>
    // window.open("/admin/servis/service_masuk/"+<?php echo old('print_s_masuk');?>, '_blank');

    function print_sale_a(id){

    var config = qz.configs.create("Printer Name");
    var data = [{
    type: 'pixel',
    format: 'html',
    flavor: 'file', // or 'plain' if the data is raw HTML
    data: '/admin/daftar_penjualan/cetak/'+id
    }];
    qz.print(config, data).catch(function(e) { console.error(e); });
    }

</script>
<script src="https://cdn.rawgit.com/kjur/jsrsasign/c057d3447b194fa0a3fdcea110579454898e093d/jsrsasign-all-min.js"></script>
<script src="{{asset('demo/assets/signing/sign-message.js')}}"></script>
@endsection
