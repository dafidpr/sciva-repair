@extends('template.layout')
@section('title', 'Grafik')
@section('content')

<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header bg-white">
                <h6>Grafik 10 barang terlaris</h6>
            </div>
            <div class="card-body">
                <div width='300px'>
                    <canvas id="G_barang_laris"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="card">
            <div class="card-header bg-white">
                <h6>Grafik Laba Rugi</h6>
            </div>
            <div class="card-body">
                <div width='300px'>
                    <canvas id="grafik_laba"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card">
            <div class="card-header bg-white">
                <h6>Grafik Pengeluaran</h6>
            </div>
            <div class="card-body">
                <div>
                    <canvas id="pengeluaran_grafik"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
