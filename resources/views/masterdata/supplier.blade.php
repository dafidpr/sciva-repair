@extends('template.layout')
@section('title', 'Supplier')
@section('content')

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

<div class="card">

    <div class="card-body">
        @can('create-suppliers')
        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i> Tambah Supplier</a>
        @endcan
        <hr>


        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Telepone</th>
                        {{-- <th>Email</th> --}}
                        <th>Bank</th>
                        <th>Rekening</th>
                        <th>Nama Rek</th>
                        <th>Alamat</th>
                        @canany(['update-suppliers', 'delete-suppliers'])
                        <th>Aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $item)
                    <tr>
                        <td>{{$item->supplier_code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->telephone}}</td>
                        {{-- <td>l</td> --}}
                        <td>{{$item->bank}}</td>
                        <td>{{$item->account_number}}</td>
                        <td>{{$item->bank_account_name}}</td>
                        <td>{{$item->address}}</td>
                        @canany(['update-suppliers', 'delete-suppliers'])
                        <td>
                            @can('update-suppliers')
                            <a href="#" class="text-primary" onclick="editData({{$item->id}})"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('delete-suppliers')
                            <a href="#" class="text-primary" onclick="hapusdata({{$item->id}})"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                        @endcanany
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- modals tambah --}}
<td>
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" >Modal demo</button> --}}
    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Tambah Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/supplier/create" method="post">
                        @csrf
                        <div>
                            <label for="">Kode</label>
                            <input type="text" class="form-control" name="supplier_code" id="supplier_code" placeholder="Supplier Code" value="{{$sup_code}}" readonly>
                        </div>
                        <div>
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama.." value="{{old('name')}}" required>
                        </div>
                        <div>
                            <label for="">Telephone</label>
                            <input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone.." value="{{old('telephone')}}" required>
                        </div>
                        <div>
                            <label for="">Bank</label>
                            <input type="text" class="form-control" name="bank" id="bank" placeholder="Bank.." value="{{old('bank')}}" required>
                        </div>
                        <div>
                            <label for="">Nomor Rekening</label>
                            <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Nomor Rekening.." value="{{old('account_number')}}" required>
                        </div>
                        <div>
                            <label for="">Nama Rekening</label>
                            <input type="text" class="form-control" name="bank_account_name" id="bank_account_name" placeholder="Nama Rekening.." value="{{old('bank_account_name')}}" required>
                        </div>
                        <div>
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Alamat..." value="{{old('address')}}" required>
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
</td>
{{-- end modals tambah --}}
{{-- Edit Modals --}}
<td>
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" >Modal demo</button> --}}
    <!-- sample modal content -->
    <div id="myEditModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/supplier/update" method="post">
                        @csrf
                        <div>
                            <input type="hidden" name="id" id="e_id">
                            <label for="">Kode</label>
                            <input type="text" class="form-control" name="supplier_code" id="e_supplier_code" placeholder="Supplier Code" readonly>
                        </div>
                        <div>
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" id="e_name" placeholder="Nama.." value="{{old('name')}}" required>
                        </div>
                        <div>
                            <label for="">Telephone</label>
                            <input type="text" class="form-control" name="telephone" id="e_telephone" placeholder="telephone.." value="{{old('telephone')}}" required>
                        </div>
                        <div>
                            <label for="">Bank</label>
                            <input type="text" class="form-control" name="bank" id="e_bank" placeholder="Bank.." value="{{old('bank')}}" required>
                        </div>
                        <div>
                            <label for="">Nomor Rekening</label>
                            <input type="text" class="form-control" name="account_number" id="e_account_number" placeholder="Nomor Rekening.." value="{{old('account_number')}}" required>
                        </div>
                        <div>
                            <label for="">Nama Rekening</label>
                            <input type="text" class="form-control" name="bank_account_name" id="e_bank_account_name" placeholder="Nama Rekening.." value="{{old('bank_account_name')}}" required>
                        </div>
                        <div>
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="address" id="e_address" placeholder="Alamat..." value="{{old('address')}}" required>
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
</td>
{{-- End Edit Modals --}}



{{-- sweet alert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/supplier.js')}}"></script>
@endsection
