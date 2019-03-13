@extends('layouts.app')
@section('content')
<div class="container-fluid elegant-color-dark white-text pt-5">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-lg-8">
      <h1 class="text-center">Tentang Sekolah</h1>
      <div class="row py-3">
        <div class="col-sm-12 col-md-6 col-lg-3">
          <img src="{{ asset('/img/about/kdwnew.png') }}" style="width: 85%; border-radius: 100%;" class="d-block mx-auto my-3 z-depth-1" alt="">          
        </div>
        <div class="col-sm-12 col-md-6 col-lg-9">
          <p>SMK Negeri 1 Kedawung merupakan sekolah menengah kejuruan negeri yang berada di Kabupaten Cirebon, Jawa Barat, Indonesia.
          Berlokasi di Jalan Tuparev No. 12 Kedawung Kabupaten Cirebon.
          Masa pendidikan di SMK Negeri 1 Kedawung ditempuh dalam waktu tiga tahun pelajaran, mulai dari kelas X hingga kelas XII, seperti pada umumnya masa pendidikan sekolah menengah kejuruan di Indonesia.</p>
          <p>Lebih lengkapnya, bisa kalian <u><a style="color: white;" href="https://id.wikipedia.org/wiki/SMK_Negeri_1_Kedawung">baca di sini</a></u>.
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-sm-12 col-lg-8">
      <hr style="border-top: 1px solid rgba(255, 255, 255, 0.1);" />
      <h1 class="text-center mt-5">Tentang Pengembang</h1>
      <div class="row py-3">
        <div class="col-sm-12 col-md-6 col-lg-3">
          <img src="{{ asset('/img/about/aghitsnidallah.jpg') }}" style="width: 85%; border-radius: 100%;" class="d-block mx-auto my-3 z-depth-1" alt="">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-9" style="text-align: justify;">
          <p>Hai, perkenalkan nama saya Aghits Nidallah. Saya lahir pada tanggal 16 Maret 2001 di Cirebon.
          Saat aplikasi ini dibuat, saya bersekolah di SMK Negeri 1 Kedawung mengambil jurusan Multimedia.
          Aplikasi ini dibangun untuk memenuhi salah satu persyaratan kelulusan jurusan Multimedia.</p>
          <p>Berbekal pengalaman <i>Web Design</i> dan <i>Web Developing</i> selama 2 tahun belajar di sekolah ini,
          untuk terakhir kalinya saya mendedikasikan waktu untuk sekolah ini melalui aplikasi yang saya buat.</p>
          Kalian bisa menemui saya melalui media sosial <u><a style="color: white;" href="https://facebook.com/nikarashi.hatsu">Facebook</a></u>, <u><a style="color: white;" href="https://twitter.com/nikarashihatsu">Twitter</a></u>, atau <u><a style="color: white;" href="https://instagram.com/nikarashihatsu">Instagram</a></u>.
        </div>
      </div>
      <hr class="mb-0" style="border-top: 1px solid rgba(255, 255, 255, 0.1);" />
    </div>
  </div>
</div>
@endsection