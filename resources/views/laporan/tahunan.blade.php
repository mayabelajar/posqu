@extends('admin.sidebar')

@section('content')
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    Laporan
  </button>
  <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ url('/harian') }}">Hari Ini</a>
      <a class="dropdown-item" href="{{ url('/bulanan') }}">Bulan</a>
      <a class="dropdown-item" href="{{ url('/tahunan') }}">Tahun</a>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="tahunan">
      <canvas id="myChart" width="400" height="200"></canvas>

      <script> 
        const ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: @json($years),
            datasets: [{
              label: 'Penghasilan per-tahun',
              data: @json($annualIncome),
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
    </div>
  </div>
</div>
@endsection