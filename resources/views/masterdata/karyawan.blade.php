@extends('template.layout')
@section('title', 'Karyawan')
@section('content')

<div class="card">

    <div class="card-body">
        @can('create-users')
        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i> Tambah Karyawan</a>
        @endcan
        <hr>
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
                        <th>Telephone</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th>Komisi</th>
                        @canany(['update-users', 'delete-users', 'changePass-users'])
                        <th>Aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{$item->telephone}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->address}}</td>
                        <td>@foreach ($item->getRoleNames() as $aa)
                            {{$aa}}
                        @endforeach</td>
                        <td>{{$item->commission}}</td>
                        <td>
                            @can('update-users')
                            <a href="#" class="text-primary ms-2" onclick="editKaryawan({{$item->id}})"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('delete-users')
                            <a href="#" class="text-primary ms-2" onclick="hapusdatauser({{$item->id}})"><i class="fas fa-trash"></i></a>
                            @endcan
                            @can('changePass-users')
                            <a href="/admin/karyawan/change_Passbyadmin/{{$item->id}}" class="text-primary ms-2"><i class="fas fa-lock"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@can('read-roles')

<div class="card">
    {{-- <div class="card-header bg-white">
    </div> --}}
    <div class="card-body">
        <h6>Level Karyawan</h6><hr>
        @can('create-roles')
        <a href="#" class="btn btn-primary btn-sm mb-3"  data-bs-toggle="modal" data-bs-target=".staticBackdrop"><i class="fas fa-plus"></i> Tambah Level</a>
        @endcan
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;">
                <thead>
                    <tr>
                        {{-- <th width="10%">No</th> --}}
                        <th>Level</th>
                        @canany(['update-roles', 'change-permissions', 'delete-roles'])
                        <th width="50%">aksi</th>
                        @endcanany
                    </tr>
                </thead>
                @foreach ($roles as $item)
                <tbody>
                    <tr>
                        {{-- <th>$</th> --}}
                        <th>{{$item->name}}</th>
                        <th>
                            @can('update-roles')
                            <a href="#" class="text-primary ms-2" onclick="editRole({{$item->id}})"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('changePermissions-roles')
                            <a href="/admin/karyawan/changepermission/{{$item->id}}" class="text-primary ms-2"><i class="fas fa-key"></i></a>
                            @endcan
                            @can('delete-roles')
                            <a href="#" class="text-primary ms-2" onclick="hapusdatarole({{$item->id}})"><i class="fas fa-trash"></i></a>
                            @endcan
                        </th>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endcan




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
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nama" required>
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
                        <label for="">Komisi</label>
                        <input type="text" class="form-control" name="commission" value="{{old('commission')}}" placeholder="Komisi.." required>
                        @if ($errors->has('commission'))
                        <span class="text-danger">{{ $errors->first('commission') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Level</label>
                        <select class="form-select" name="role" aria-label="Default select example" required>
                            <option selected="">--Pilih--</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('level'))
                        <span class="text-danger">{{ $errors->first('level') }}</span>
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
                        <input type="text" class="form-control" id="e_telephone" name="telephone" placeholder="telephone" required>
                        @if ($errors->has('telephone'))
                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" id="e_name" placeholder="Nama" required>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">username</label>
                        <input type="text" class="form-control" name="username" id="e_username" placeholder="Username.." required>
                        @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Komisi</label>
                        <input type="text" class="form-control" name="commission" id="e_commission" placeholder="Komisi" required>
                        @if ($errors->has('commission'))
                        <span class="text-danger">{{ $errors->first('commission') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Level</label>
                        <select class="form-select e_role" name="role" aria-label="Default select example" required>
                            @foreach ($roles as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('level'))
                        <span class="text-danger">{{ $errors->first('level') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat</label>
                        <textarea name="address" id="e_address" class="form-control e_address" cols="10" rows="5"></textarea>
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


    <!-- Small modal -->
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Modal demo</button> --}}

    <!-- Modal -->
<div class="modal fade staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Level</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="/admin/karyawan/createRole" method="post">
            @csrf
            <div>
                <label for="">Role</label>
                <input type="text" name="role" id="role" class="form-control" placeholder="role" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
        </form>
    </div>
</div>
</div>
</div>
    <!-- Modal -->
<div class="modal fade myEditRole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Level</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="/admin/karyawan/updateRole" method="post">
            @csrf
            <div>
                <label for="">Role</label>
                <input type="hidden" name="id" id="idRole" class="form-control" placeholder="role">
                <input type="text" name="name" id="roleEdit" class="form-control role" placeholder="role">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
        </form>
    </div>
</div>
</div>
</div>






{{-- sweet alert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/karyawan.js')}}"></script>
@endsection
