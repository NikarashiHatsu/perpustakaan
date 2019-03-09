@extends('layouts.penulis')
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-4">
    <div class="card bg-dark white-text mb-3">
      <div class="card-header">
        <i class="fas fa-chart-line mr-3"></i>
        Kilas Statistik
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Buku diunggah
          <span class="badge badge-pill badge-white">{{ App\Book::where('user_id', Auth::user()->id)->count() }}x</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Buku dilihat
          <span class="badge badge-pill badge-white">{{ $lihat_akumulatif }}x</span>
        </li>
        <li class="list-group-item bg-dark d-flex justify-content-between align-items-center">
          Buku diunduh
          <span class="badge badge-pill badge-white">{{ $unduh_akumulatif }}x</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-sm-12 col-md-8 order-first">
    @if($change == 1)
      <div class="card bg-warning mb-3">
        <div class="card-header">
          <i class="fas fa-exclamation-triangle mr-3"></i>
          Peringatan
        </div>
        <div class="card-body">
          Anda masih menggunakan kata sandi yang dibuat secara otomatis oleh sistem. Kami menyarankan agar mengubah kata sandi secepatnya.
          <a class="black-text" href="{{ url('/penulis/pengaturan') }}"><b>Ubah kata sandi</b></a>.
        </div>
      </div>
    @endif
    <div class="card bg-dark white-text mb-3">
      <div class="card-header">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Dashboard
      </div>
      <div class="card-body">
        Selamat datang, NikarashiHatsu
      </div>
    </div>
    <div class="card bg-dark white-text">
      <div class="card-header">
        <i class="fas fa-chart-pie mr-3"></i>
        Statistik <i>{{ Auth::user()->name }}</i> Tahun {{ getdate()['year'] }}
      </div>
      <div class="card-body">
        <canvas id="myChart" height="200"></canvas>
        <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: [{!! $data_bulan !!}],
                datasets: [{
                  label: 'Buku Diunggah',
                  data: [{!! $data_diunggah !!}],
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255,99,132,1)',
                  borderWidth: 1,
                }, {
                  label: 'Buku Diunduh',
                  data: [{!! $data_diunduh !!}],
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1,
                }, {
                  label: 'Buku Dilihat',
                  data: [{!! $data_dilihat !!}],
                  backgroundColor: 'rgba(255, 206, 86, 0.2)',
                  borderColor: 'rgba(255, 206, 86, 1)',
                  borderWidth: 1,
                }]
              },
              options: {
                  elements: {
                    line: {
                      tension: 0,
                    }
                  },
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true,
                              userCallback: function(label, index, labels) {
                                if (Math.floor(label) === label) {
                                    return label;
                                }
                              }
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