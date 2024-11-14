<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div>
        <canvas id="myChart1"></canvas>
        <canvas id="myChart2"></canvas>
    </div>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'Oct',
            'November',
            'December',
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Laporan Bulanan',
                backgroundColor: '#f6c029',
                borderColor: 'yellow',
                data: [10, 15, 20, 25, 30, 30, 25, 45, 50, 45, 60, 61],
        }]
        };

        const config = {
            type: 'line',
            data: data,
            option: {}
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>