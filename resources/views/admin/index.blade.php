@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-4 order-sm-first order-md-last">
    <div class="card bg-dark white-text mb-4">
      <div class="card-header">
        <i class="fas fa-chart-line mr-3"></i>
        Kilas Data
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Admin
          <span class="badge badge-pill badge-white">3</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Guru
          <span class="badge badge-pill badge-white">20</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Siswa
          <span class="badge badge-pill badge-white">1500</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Kategori
          <span class="badge badge-pill badge-white">40</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Buku
          <span class="badge badge-pill badge-white">6</span>
        </li>
      </ul>
    </div>
    <div class="card bg-dark white-text mb-4">
      <div class="card-header">
        <i class="fas fa-chart-bar mr-3"></i>
        Kilas Statistik Tahun {{ getdate()['year'] }}
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Buku Diunggah
          <span class="badge badge-pill badge-white">6x</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Buku Diunduh
          <span class="badge badge-pill badge-white">10x</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Buku Dilihat
          <span class="badge badge-pill badge-white">20x</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Buku Difavoritkan
          <span class="badge badge-pill badge-white">20x</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-sm-12 col-md-8">
    <div class="card bg-dark white-text mb-4">
      <div class="card-header">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Dashboard
      </div>
      <div class="card-body">
        Selamat datang, {{ Auth::user()->name }}
      </div>
    </div>
    <div class="card bg-dark white-text">
      <div class="card-header">
        <i class="fas fa-chart-pie mr-3"></i>
        Statistik Tahun {{ getdate()['year'] }}
      </div>
      <div class="card-body">
        <canvas id="myChart" height="200"></canvas>
        <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                          "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                  label: 'Buku Diunggah',
                  data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255,99,132,1)',
                  borderWidth: 1,
                }, {
                  label: 'Buku Diunduh',
                  data: [19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12],
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1,
                }, {
                  label: 'Buku Dilihat',
                  data: [3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19],
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