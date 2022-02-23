@extends('template.layout')
@section('title', 'Laba Rugi')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white">
                    <h5>Laporan Laba Rugi</h5>
                </div>
                <div class="card-body">
                    <form action="/admin/lap_labarugi/cetak_lababersih" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Tanggal Awal</label>
                                    <input type="date" name="from" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label for="">Tanggal Akhir</label>
                                    <input type="date" name="to" class="form-control">
                                </div>
                            </div>
                            {{-- <div>
                                <div>
                                    <label for="">Biaya Lain</label>
                                    <input type="hidden" name="lain" placeholder="Biaya Lainnya" value="0"
                                        class="form-control">
                                </div>
                            </div> --}}
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-sm btn-primary text-center"><i
                                        class="fas fa-file-pdf"></i> Print PDF</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
