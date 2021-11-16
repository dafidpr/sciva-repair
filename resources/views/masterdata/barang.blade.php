@extends('template.layout')
@section('title', 'Barang')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i> Tambah Barang</a>
        {{-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i> Export Barang</a> --}}
        <a href="" class="btn btn-light btn-sm"><i class="fas fa-upload"></i> Import Barang</a>
    </div>
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
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga beli</th>
                        <th>Harga jual</th>
                        <th>Harga member</th>
                        <th>Stok</th>
                        <th>Limit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                    <tr>
                        <td>
                            <a href="#" class="text-primary" onclick="editBarang('{{$item->id}}')"><i class="fas fa-edit"></i></a>
                            <a href="#" class="text-primary" onclick="hapusdatabarang('{{$item->id}}')"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>{{$item->barcode}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>{{$item->purchase_price}}</td>
                        <td>{{$item->member_price}}</td>
                        <td>
                            @if ($item->stock == $item->limit || $item->stock < $item->limit)
                            <span class="btn btn-sm btn-danger">{{$item->stock}}</span>
                            @else
                            <span class="btn btn-sm btn-success">{{$item->stock}}</span>
                            @endif
                        </td>
                        <td><span class="btn btn-sm btn-danger">{{$item->limit}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- Modals --}}

    <!-- Modal Tambah Data -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Tambah Barang</h5>
                </div>
                <div class="modal-body">
                <form action="/admin/barang/tambahbarang" method="post">
                        @csrf
                        <div>
                            <label for="">Barcode</label>
                            <input type="text" class="form-control" name="barcode" placeholder="Barcode" required>
                            @if ($errors->has('barcode'))
                            <span class="text-danger">{{ $errors->first('barcode') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Barang" required>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Harga Jual</label>
                            <input type="number" class="form-control" name="selling_price" placeholder="Harga Jual" required>
                            @if ($errors->has('selling_price'))
                            <span class="text-danger">{{ $errors->first('name_aspek') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Harga Beli</label>
                            <input type="number" class="form-control" name="purchase_price" placeholder="Harga Beli" required>
                            @if ($errors->has('purchase_price'))
                            <span class="text-danger">{{ $errors->first('purchase_price') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Harga Member</label>
                            <input type="number" class="form-control" name="member_price" placeholder="Harga Member" required>
                            @if ($errors->has('member_price'))
                            <span class="text-danger">{{ $errors->first('member_price') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">limit</label>
                            <input type="number" class="form-control" name="limit" placeholder="limit" required>
                            @if ($errors->has('limit'))
                            <span class="text-danger">{{ $errors->first('limit') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Supplier</label>
                            <select class="form-select" name="supplier_id" aria-label="Default select example" required>
                                <option value="" selected>Pilih...</option>
                                @foreach ($supplier as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('supplier_id'))
                            <span class="text-danger">{{ $errors->first('supplier_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    {{-- Modal Edit Data --}}
    <div id="myEditModal" class="modal fade" tabindex="-1" aria-labelledby="myEditModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Tambah Barang</h5>
                </div>
                <div class="modal-body">
                <form action="/admin/barang/editdata" method="post">
                        @csrf
                        <div>
                            <input type="hidden" id="id" name="id">
                            <label for="">Barcode</label>
                            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Barcode" required>
                            @if ($errors->has('barcode'))
                            <span class="text-danger">{{ $errors->first('barcode') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Barang" required>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Harga Jual</label>
                            <input type="number" class="form-control" name="selling_price" id="selling_price" placeholder="Harga Jual" required>
                            @if ($errors->has('selling_price'))
                            <span class="text-danger">{{ $errors->first('name_aspek') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Harga Beli</label>
                            <input type="number" class="form-control" name="purchase_price" id="purchase_price" placeholder="Harga Beli" required>
                            @if ($errors->has('purchase_price'))
                            <span class="text-danger">{{ $errors->first('purchase_price') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Harga Member</label>
                            <input type="number" class="form-control" name="member_price" id="member_price" placeholder="Harga Member" required>
                            @if ($errors->has('member_price'))
                            <span class="text-danger">{{ $errors->first('member_price') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">limit</label>
                            <input type="number" class="form-control" id="limit" name="limit" placeholder="limit" required>
                            @if ($errors->has('limit'))
                            <span class="text-danger">{{ $errors->first('limit') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Supplier</label>
                            <select class="form-select" id="supplier_id" name="supplier_id" aria-label="Default select example" required>
                                @foreach ($supplier as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('supplier_id'))
                            <span class="text-danger">{{ $errors->first('supplier_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
{{-- end-modals --}}


{{-- sweet alert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/barang.js')}}"></script>


@endsection
