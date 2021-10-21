//deklarasi chartjs untuk membuat grafik 2d di id mychart
var ctx = document.getElementById('G_barang_laris').getContext('2d');

var myChart = new Chart(ctx, {
 //chart akan ditampilkan sebagai bar chart
    type: 'bar',
    data: {
     //membuat label chart
        labels: ['Samsung', 'Xiaomi', 'Charger', 'USB', 'Screen Touchscreen', 'Asus', 'Vivo', 'Oppo', 'Battery', 'Casing'],
        datasets: [{
            label: '# Jumlah',
            //isi chart
            data: [12, 19, 3, 5, 2, 3, 5, 3, 2,5],
            //membuat warna pada bar chart
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});






//Laba Rugi
//deklarasi chartjs untuk membuat grafik 2d di id mychart
var ctx = document.getElementById('grafik_laba').getContext('2d');

var myChart = new Chart(ctx, {
 //chart akan ditampilkan sebagai bar chart
    type: 'line',
    data: {
     //membuat label chart
        labels: ['2020-09-20', '2020-09-21', '2020-09-22'],
        datasets: [{
            label: '# Labah Bersih',
            //isi chart
            data: [12, 19, 3],
            //membuat warna pada bar chart
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        },
        {
            label: '# Laba Kotor',
            //isi chart
            data: [7, 4, 12],
            //membuat warna pada bar chart
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
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
