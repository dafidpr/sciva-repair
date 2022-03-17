@extends('template.layout')
@section('title', 'Footer Nota')
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

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Penjualan</h4>
                <form action="/admin/footer_nota/updateNotaSale" method="post">
                    @csrf
                    <textarea name="value" class="form-control" id="editor" cols="70" rows="6" required>{{$footer_sale->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Penjualan Epson</h4>
                <form action="/admin/footer_nota/updateNotaSaleEp" method="post">
                    @csrf
                    <textarea name="value" class="form-control"  cols="70" rows="4" required>{{$footer_sale_ep->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
                <div>
                    <span class="text-danger">Note :</span><br>
                    <span class="text-danger">'+'/x0A'+' untuk baris baru</span><br>
                    <span class="text-danger">Tidak boleh Enter Didalam form</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Servis</h4>
                <form action="/admin/footer_nota/updateNotaServis" method="post">
                    @csrf
                    <textarea name="value" class="form-control" id="editor2" cols="20" rows="6">{{$footer_servis->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Servis Epson</h4>
                <form action="/admin/footer_nota/updateNotaServisEp" method="post">
                    @csrf
                    <textarea name="value" class="form-control"  cols="20" rows="4">{{$footer_servis_ep->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
                <div>
                    <span class="text-danger">Note :</span><br>
                    <span class="text-danger">'+'/x0A'+' untuk baris baru</span><br>
                    <span class="text-danger">Tidak boleh Enter Didalam form</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Servis Diambil</h4>
                <form action="/admin/footer_nota/updateNotaServisTake" method="post">
                    @csrf
                    <textarea name="value" class="form-control" id="editor3" cols="20" rows="6">{{$footer_servis_take->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4>Footer Nota Servis Diambil Epson</h4>
                <form action="/admin/footer_nota/updateNotaServisTakeEp" method="post">
                    @csrf
                    <textarea name="value" class="form-control"  cols="20" rows="4">{{$footer_servis_take_ep->value}}</textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
                </form>
                <div>
                    <span class="text-danger">Note :</span><br>
                    <span class="text-danger">'+'/x0A'+' untuk baris baru</span><br>
                    <span class="text-danger">Tidak boleh Enter Didalam form</span>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
