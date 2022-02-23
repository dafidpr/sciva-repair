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

    {{-- Modal Check Out --}}
<div id="modal_print_check" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Cetak Print</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-size-16 text-center">Pilih Untuk Cetak Print!!</h5>
                <div class="row" id="choose_print">
                    <div class="col-md-6">
                        <a href="/admin/daftar_penjualan/cetak/{{old('print_s_penjualan')}}" style="width: 100%;" target="_blank" class="btn btn-primary btn-block">Termal</a>
                    </div>
                    <div class="col-md-6">
                        <a href="/admin/daftar_penjualan/cetak_epson/{{old('print_s_penjualan')}}" target="_blank" style="width: 100%;"class="btn btn-secondary btn-block">Epson</a>
                    </div>
                </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->



<script>

    function print_sale_a(id){
        // window.open("/admin/daftar_penjualan/cetak/"+id, '_blank');

        print_penjualan_choose(id)
    }

</script>
@endsection
