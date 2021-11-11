@extends('template.layout')
@section('title', 'Karyawan')
@section('content')

<div class="card">
    <div class="card-header bg-white">
        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i> Tambah Karyawan</a>
        {{-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf"></i> Export Karyawan</a>
        <a href="" class="btn btn-light btn-sm"><i class="fas fa-upload"></i> Import Karyawan</a> --}}
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
                        <th>Telephone</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>Komisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>
                            <a href="#" class="text-primary" onclick="editKaryawan({{$item->id}})"><i class="fas fa-edit"></i></a>
                            <a href="#" class="text-primary" onclick="hapusdatauser({{$item->id}})"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>{{$item->telephone}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->address}}</td>
                        <td>00</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h6>Level Karyawan</h6>
    </div>
    <div class="card-body">
        <a href="" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i> Tambah Level</a>
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th>Level</th>
                        <th width="50%">Permision</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Admin</th>
                        <th> semua semua semua semua semua semua semua</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>




{{-- models tambah karyawan --}}
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Karyawan</h5>
            </div>
            <div class="modal-body">
            <form action="/admin/karyawan/tambah" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">Telephone</label>
                        <input type="text" class="form-control" value="{{old('telephone')}}" name="telephone" placeholder="telephone" required>
                        @if ($errors->has('telephone'))
                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nama Barang" required>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">username</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Username.." required>
                        @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password.." required>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat</label>
                        <textarea name="address" id="address" class="form-control" cols="10" rows="5">{{old('address')}}</textarea>
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

{{-- edit karyawan?\ --}}
<div id="myEditModal" class="modal fade" tabindex="-1" aria-labelledby="myEditModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Karyawan</h5>
            </div>
            <div class="modal-body">
            <form action="/admin/karyawan/update" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" id="id" name="id">
                        <label for="">Telephone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="telephone" required>
                        @if ($errors->has('telephone'))
                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Barang" required>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username.." required>
                        @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat</label>
                        <textarea name="address" id="address" class="form-control address" cols="10" rows="5"></textarea>
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



{{-- sweet alert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/karyawan.js')}}"></script>
@endsection
