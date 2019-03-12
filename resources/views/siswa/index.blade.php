@extends('layouts.siswa')
@section('content')
<div class="row">
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
        Selamat datang, {{ Auth::user()->name }}
      </div>
    </div>
  </div>
</div>
@endsection