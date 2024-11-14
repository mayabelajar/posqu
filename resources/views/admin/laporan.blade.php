@extends('admin.sidebar')

@section('content')
    <div class="container">
    <div class="row">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </div>
        </div>
    <div class="row">
        <div class="pendapatan col-6">
        One of three columns
        </div>
        <div class="menu col-6">
            <div style="width: 300px;">
                <canvas id="myChart1"></canvas>
            </div>
        </div>
        <script>
            const data1= {
            labels: ['Rujak Cingur', 'Kerak Telor', 'Dawet Ayu', 'Lumpia', 'Papeda', 'Sekoteng'],
            datasets: [{
                label: 'Menu Paling Laku',
                backgroundColor: [
                '#8979FF',
                '#FF928A',
                '#3CC3DF',
                '#FFAE4C',
                '#537FF1',
                '#6FD195'
                ],
                data: [87, 20, 46, 39, 14, 13],
                hoverOffset: 4
            }]
            };
            const ctx1 = document.getElementById('myChart1').getContext('2d');
            const myChart1 = new Chart(ctx1, {
                type: 'doughnut', // atau 'bar', 'pie', dll.
                data: data1,
                options: {
                    // ... opsi konfigurasi
                }
            });
        </script>
        <div class="pelanggan col-sm">
        <div style="width: 800px align: center; ">
        <canvas id="myChart2"></canvas>
        </div>
        <script>
            const data2= {
                labels: ['10.00', '11.00', '12.00', '13.00', '14.00', '15.00', '16.00', '17.00', '18.00', '19.00', '20.00', '21.00'],
                datasets: [{
                    label: 'Jumlah Pelanggan',
                    backgroundColor: '#F6C029',
                    data: [2, 3, 10, 25, 5, 15, 16, 14, 20, 21, 24, 2],
            }]
            };
            const ctx2 = document.getElementById('myChart2').getContext('2d');
            const myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: data2,
                options: {
                    // ... opsi konfigurasi
                }
            });
        </script>
        </div>
    </div>
    </div>
@endsection