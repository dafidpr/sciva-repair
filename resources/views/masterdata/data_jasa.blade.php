@extends('template.layout')
@section('title', 'Jasa')
@section('content')

<div class="card">
    <div class="card-body">
        @can('create-repaire')
        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i> Tambah Jasa</a>
        @endcan

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
        <hr>

        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13;" id="stoklimit">
                <thead>
                    <tr>
                        @canany(['update-repaire', 'delete-repaire'])
                        <th>Aksi</th>
                        @endcanany
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repaire as $item)
                    <tr>
                        @canany(['update-repaire', 'delete-repaire'])
                        <td>
                            @can('update-repaire')
                            <a href="#" onclick="editJasa({{$item->id}})" class="text-primary"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('delete-repaire')
                            <a href="#" onclick="hapusdatajasa({{$item->id}})" class="text-primary"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                        @endcanany
                        <td>{{$item->repaire_code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<td>
    {{-- <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" >Modal demo</button> --}}
    <!-- sample modal content -->
    {{-- tambah jasa --}}
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/jasa/create" method="post">
                        @csrf
                        {{-- <div class="mb-3">
                            <label for="">Kode</label>
                            <input type="text" name="repaire_code" value="" class="form-control" readonly>
                        </div> --}}
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Harga</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{-- edit jasa --}}
    <div id="myEditModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/jasa/update" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Kode</label>
                            <input type="hidden" name="id" id="id" class="form-control">
                            <input type="text" name="repaire_code" id="repaire_code" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Harga</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</td>

<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/jasa.js')}}"></script>
@endsection
