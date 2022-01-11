@extends('template.layout')
@section('title', 'Grafik')
@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            {{-- <div class="card-header bg-white">
            </div> --}}
            <div class="card-body">
                <h6>Grafik 10 barang terlaris</h6>
                <div width='300px'>
                    <canvas id="G_barang_laris"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            {{-- <div class="card-header bg-white">
            </div> --}}
            <div class="card-body">
                <h6>Grafik Laba Rugi</h6>
                <div width='300px'>
                    <canvas id="grafik_laba"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const name = [
                    @foreach ($terlaris as $item)
                    <?= "'".$item->name."'"?>,
                    @endforeach
                    ];

    var total = [
                    @foreach ($terlaris as $item)
                    <?= "'".$item->total."'"?>,
                    @endforeach
                    ];
    const tgl = [
                    @foreach ($laba as $item)
                    <?= "'".$item->tgl."'"?>,
                    @endforeach
                    ];

    var total_laba = [
                    @foreach ($laba as $item)
                    <?= "'".$item->total."'"?>,
                    @endforeach
                    ];
</script>
@endsection
