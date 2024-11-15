@extends('admin.sidebar')

@section('content')
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const labels = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: "My First dataset",
                backgroundColor: '#F6C029',
                data: [10.000.000, 15.000.000, 20.000.000, 25.000.000, 30.000.00, 35.000.000, 40.000.000, 45.000.000, 50.000.000, 45.000.000, 40.000.000, 50.000.000],
            }] 
        };

        const config = {
            type: 'line',
            data: 'data',
            options: {}
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection