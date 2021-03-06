@extends('template.layout')
@section('title', 'Pelanggan')
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
        @can('create-customers')
        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i> Tambah Pelanggan</a>
        @endcan
        <hr>

        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Jenis</th>
                        {{-- <th>Piutang</th> --}}
                        @canany(['update-customers', 'delete-customers', 'changePassword-customers'])
                        <th>Aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->telephone}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->type}}</td>
                        {{-- <td>100000</td> --}}
                        @canany(['update-customers', 'delete-customers', 'changePassword-customers'])
                        <td>
                            @if ($item->umum != 'umum' and $item->address != 'umum')

                            @can('update-customers')
                            <a href="#" class="text-primary ms-2" onclick="editData({{$item->id}})"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('delete-customers')
                            <a href="#" class="text-primary ms-2" onclick="hapusdata({{$item->id}})"><i class="fas fa-trash"></i></a>
                            @endcan
                            @can('changePassword-customers')
                            <a href="#" class="text-primary ms-2" onclick="changePtoD({{$item->id}})"><i class="fas fa-undo-alt"></i></a>
                            @endcan
                            @endif
                        </td>
                        @endcanany
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modals Tambah Data --}}
<td>
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Modal demo</button> --}}
    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Tambah Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/pelanggan/create" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nama" required>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Telephone</label>
                            <input type="text" class="form-control" name="telephone" value="{{old('telephone')}}" placeholder="Telephone" required>
                            @if ($errors->has('telephone'))
                            <span class="text-danger">{{ $errors->first('telephone') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Type</label>
                            <select class="form-select" name="type" aria-label="Default select example" required>
                                <option value="{{old('type')}}">--Pilih--</option>
                                <option value="umum">Umum</option>
                                <option value="member">Member</option>
                            </select>
                            @if ($errors->has('type'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Alamat" required>
                            @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
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
    {{-- Edit Modals --}}
    <div id="myEditModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Edit Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/pelanggan/update" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="hidden" class="form-control" name="id" id="id" value="{{old('id')}}" placeholder="id" required>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Nama" required>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Telephone</label>
                            <input type="text" class="form-control" name="telephone" id="telephone" value="{{old('telephone')}}" placeholder="Telephone" required>
                            @if ($errors->has('telephone'))
                            <span class="text-danger">{{ $errors->first('telephone') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Type</label>
                            <select class="form-select" name="type" id="type" aria-label="Default select example" required>
                                <option value="{{old('type')}}">--Pilih--</option>
                                <option value="umum">Umum</option>
                                <option value="member">Member</option>
                            </select>
                            @if ($errors->has('type'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" placeholder="Alamat" required>
                            @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
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
</td>


<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/pelanggan.js')}}"></script>
@endsection
