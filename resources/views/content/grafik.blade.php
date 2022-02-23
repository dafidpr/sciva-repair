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
                <?= "'" . $item->name . "'" ?>,
            @endforeach
        ];

        const total = [
            @foreach ($terlaris as $item)
                <?= "'" . $item->total . "'" ?>,
            @endforeach
        ];

        const label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
            "November", "Desember"
        ]
    </script>
@endsection
@section('c_print')
    <script>
        console.log(label)

        //Laba Rugi
        //deklarasi chartjs untuk membuat grafik 2d di id mychart
        var ctx = document.getElementById('grafik_laba').getContext('2d');

        var myChart = new Chart(ctx, {
            //chart akan ditampilkan sebagai bar chart
            type: 'line',
            data: {
                //membuat label chart
                labels: <?= json_encode($label) ?>,
                datasets: [{
                    label: '# Laba Rugi',
                    //isi chart
                    data: <?= json_encode($kas_ex) ?>,
                    //membuat warna pada bar chart
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
