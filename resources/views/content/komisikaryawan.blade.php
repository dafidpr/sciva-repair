@extends('template.layout')
@section('title', 'Komisi')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="/admin/komisi/cetak_komisi" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Tanggal Awal</label>
                            <input type="date" name="from" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" name="to" class="form-control">
                        </div>
                    </div>
                    <div>
                        <label for="">Nama Karyawan</label>
                        <select class="form-select" name="user" id="jasa" required aria-label="Default select example">
                            <option value="" selected="">Pilih...</option>
                            @foreach ($user as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="font-size: 12px;">
                        <span class="text-danger">Perhatian : Fitur ini berfungsi untuk mengetahui prestasi karyawan dan perolehan komisi karyawan per periode tanggal yang anda tentukan.</span>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Export PDF</button>
                    </div>
                </form>
            </div>
            </div>
    </div>
</div>

@endsection
