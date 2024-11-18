@extends('admin.sidebar')

@section('content')
<canvas id="myChart"
 width="400" height="200"></canvas>

  <script> 

    const ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['2021', '2022', '2023', '2024'],
        datasets: [{
          label: 'My First Dataset',
          data: [150000000, 230000000, 301000000, 405000000],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection