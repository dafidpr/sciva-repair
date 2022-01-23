@extends('template.layout')
@section('title', 'Barcode')
@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                @if (session('berhasil'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                    <strong>Selamat</strong> {{session('berhasil')}}.
                </div>
                @endif
                @if (session('gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                    <strong>Maaf</strong> {{session('gagal')}}.
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="stoklimit" width="100%" style="font-size:13px;">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th width="15%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <td>
                                    {{-- <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($item->barcode, 'EAN5')}}" alt="barcode" /> --}}
                                    {{$item->barcode}}
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->purchase_price)}}</td>
                                <td>{{number_format($item->selling_price)}}</td>
                                <td>
                                    <a href="#" onclick="selectProductGenerete({{$item->id}})" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <form action="/admin/generatebarcode/update" method="post">
                    @csrf
                    <div>
                        <label for="">BarcodeID (EAN13)</label>
                        <input type="text" name="barcode" id="barcode" class="form-control">
                    </div>
                    <div>
                        <label for="">Nama</label>
                        <input type="text" name="name" id="name_product" class="form-control" readonly>
                        <input type="hidden" name="id" id="id_product" class="form-control" readonly>
                    </div>
                    <div class="mt-3">
                        <a href="#" onclick="modalCetakBr()" class="btn btn-sm btn-primary">Cetak</a>
                        <a href="#" onclick="generateBr()" class="btn btn-sm btn-primary">Generate</a>
                        <button type="submit" class="btn btn-sm btn-warning">Update Barcode</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h6>View Barcode (EAN13)</h6>
                <div id="viewBarcode">
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Modal Cetak --}}
<div class="modal fade" id="modalCetakBr" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalScrollableTitle">Print Barcode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/generatebarcode/cetak" method="post">
                    @csrf
                    <div>
                        <label for="">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="i_jumlah">
                        <input type="hidden" class="form-control" name="barcode" id="i_barcode">
                        <input type="hidden" class="form-control" name="name_product" id="i_name_product">
                        <input type="hidden" class="form-control" name="id_product" id="i_id_product">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="sumbit" class="btn btn-primary">Print</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
{{-- End Modal Cetak --}}


{{-- Javascript --}}
<script src="{{asset('tmp/javascript/generatebarcode.js')}}"></script>
@endsection
