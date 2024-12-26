@extends('admin.sidebar')

@section('content')
<div class="container">
    <div class="row">
        <div class="dropdown mb-4">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                Laporan
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url('/harian') }}">Hari Ini</a>
                <a class="dropdown-item" href="{{ url('/bulanan') }}">Bulan</a>
                <a class="dropdown-item" href="{{ url('/tahunan') }}">Tahun</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="pendapatan mb-4 mr-4" style="justify-content: center;">
            <div><strong class="ml-4">Pendapatan Hari Ini</strong></div>
            <div style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100%;">
                <strong>Rp {{ number_format($pendapatanHarian, 0, ',', '.') }}</strong>
            </div>
        </div>
        <div class="menu col mb-4" div style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <div style="width: 300px">
                <strong class="ml-4">Menu Paling Laku</strong>
                <canvas id="myChart1"></canvas>

                <script>
                    const data1= {
                        labels: {!! json_encode($menuPalingLaku->pluck('produk.nama')) !!},
                        datasets: [{
                            label: 'Menu Paling Laku Hari Ini',
                            backgroundColor: ['#8979FF', '#FF928A', '#3CC3DF', '#FFAE4C', '#537FF1', '#6FD195'],
                            data: {!! json_encode($menuPalingLaku->pluck('total_qty')) !!},
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="pelanggan col-sm mb-4 py-4 px-4">
            <strong class="ml-4">Jumlah Pelanggan</strong>
            <div style="width: 400px align: center;">
                <canvas id="myChart2"></canvas>
            </div>
            <script>
                const data2 = {
                    labels: @json(array_map(fn($item) => sprintf('%02d:00', $item['jam']), $pelangganHarian)),
                    datasets: [{
                        label: 'Jumlah Pelanggan',
                        backgroundColor: '#F6C029',
                        data: @json(array_map(fn($item) => $item['jumlah'], $pelangganHarian)),
                    }]
                };

                const ctx2 = document.getElementById('myChart2').getContext('2d');
                const myChart2 = new Chart(ctx2, {
                    type: 'bar',
                    data: data2,
                    options: {
                        plugins: {
                            legend: { display: true },
                        },
                        scales: {
                            x: {
                                title: { display: true, text: 'Jam' },
                            },
                            y: {
                                title: { display: true, text: 'Jumlah Pelanggan' },
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                },
                                grid: {display: false},
                            },
                        },
                    }
                });
            </script>
        </div> 
    </div>
</div>
@endsection