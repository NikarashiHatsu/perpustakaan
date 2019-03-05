@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-6">
    <div class="card bg-dark white-text">
      <div class="card-header">
        <i class="fas fa-chart-pie mr-3"></i>
        Frekuensi pembaca tahun {{ getdate()['year'] }}
      </div>
      <div class="card-body">
        <canvas id="chartBar" height="200"></canvas>
        <script>
          var ctx = document.getElementById("chartBar").getContext('2d');
          var chartBar = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ["AKL", "BDP", "MM", "OTKP", "PKM", "UPW"],
                datasets: [{
                  label: 'Buku Dibaca',
                  data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255,99,132,1)',
                  borderWidth: 1,
                }, {
                  label: 'Buku Diunduh',
                  data: [19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12],
                  backgroundColor: 'rgba(255, 206, 86, 0.2)',
                  borderColor: 'rgba(255, 206, 86, 1)',
                  borderWidth: 1,
                }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
              }
          });
        </script>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6">
    <div class="card bg-dark white-text">
      <div class="card-header">
        <i class="fas fa-chart-line mr-3"></i>
        Frekuensi pembaca tahun {{ getdate()['year'] }}
      </div>
      <div class="card-body">
        <canvas id="chartLine" height="200"></canvas>
        <script>
          // var dataBulan = '{!! $data_bulan !!}';
          var ctx = document.getElementById("chartLine").getContext('2d');
          var chartLine = new Chart(ctx, {
              type: 'line',
              data: {
                labels: [{!! $data_bulan !!}],
                datasets: [{
                  label: 'Buku Dibaca',
                  data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255,99,132,1)',
                  borderWidth: 1,
                }, {
                  label: 'Buku Diunduh',
                  data: [19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12],
                  backgroundColor: 'rgba(255, 206, 86, 0.2)',
                  borderColor: 'rgba(255, 206, 86, 1)',
                  borderWidth: 1,
                }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
              }
          });
        </script>
      </div>
    </div>
  </div>
</div>
@endsection