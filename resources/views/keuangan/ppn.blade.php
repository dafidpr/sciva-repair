@extends('template.layout')
@section('title', 'PPN')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="float-sm-start">
            <h2>Pendapatan PPN ( Rp. )</h2>
        </div>
        <div class="float-sm-end">
            <h2>
                {{number_format($total)}},-
            </h2>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if (session('berhasil'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
            <strong>Selamat</strong> {{session('berhasil')}}.
        </div><hr>
        @endif
        @if (session('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
            <strong>Maaf</strong> {{session('gagal')}}.
        </div><hr>
        @endif

        @can('create-ppn')
        <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Setor pajak</a>
        @endcan

        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 13px;" id="stoklimit">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>User</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vat as $item)
                    <tr>
                        <td>{{$item->tax_code}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{number_format($item->nominal)}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->_user->name}}</td>
                        <td>
                            @can('delete-ppn', Model::class)
                            <button @if ($item->type != 'deposit') disabled='disable' @endif onclick="hapusdata({{$item->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Create Modals --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah PPN</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/admin/ppn/create_vat_tax" method="post">
                @csrf
                <div>
                    <label for="">Jenis</label>
                    <input type="text" name="type" value="deposit" class="form-control" readonly>
                </div>
                <div>
                    <label for="">Nominal</label>
                    <input type="Number" name="nominal" class="form-control" required>
                </div>
                <div>
                    <label for="">Keterangan</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
{{-- End Create Modals --}}



{{-- Sweetalert --}}
<script src="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('tmp/javascript/ppn.js')}}"></script>
@endsection
