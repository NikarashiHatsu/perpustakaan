@extends('layouts.app')
@section('content')
<div class="container-fluid elegant-color">
  <div class="row purple-gradient py-4 white-text">
    <div class="col-sm-12 col-lg-6 text-center" style="margin-top: 8rem;">
      <i class="fas {{ $content->fa_icon }} fa-5x"></i>
    </div>
    <div class="col-sm-12 col-lg-6 py-5">
      <h1>Buku</h1>
      <hr />
      <p style="text-align: justify;">{!! $content->content !!}</p>
    </div>
  </div>
  <div class="row mb-3 pt-4">
    <div class="col-sm-12">
      <h3 class="white-text">Terbaru</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-6 col-md-6 col-lg-3 col-xl-2">
      <div class="card mb-4">
        <small>
          <div class="card-img-top deep-orange" style="padding: 5rem 0;"></div>
          <div class="card-body">
            <h6>HTML Professional</h6>
            <hr />
            <a href="{{ url('/kontributor/nikarashihatsu') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-user mr-3"></i>
                NikarashiHatsu
              </p>
            </a>
            <a href="{{ url('/penerbit/goalkicker') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-globe mr-3"></i>
                GoalKicker
              </p>
            </a>
            <a href="javascript:void(0)">
              <p class="mb-1 black-text">
                <i class="fas fa-tags mr-3"></i>
                124 Halaman
              </p>
            </a>
            <hr />
            <a href="javascript:void(0)">
              <p class="mb-0 black-text">
                <i class="fas fa-clock mr-3"></i>
                1 jam yang lalu
              </p>
            </a>
          </div>
        </small>
      </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3 col-xl-2">
      <div class="card mb-4">
        <small>
          <div class="card-img-top blue" style="padding: 5rem 0;"></div>
          <div class="card-body">
            <h6>CSS3 Professional</h6>
            <hr />
            <a href="{{ url('/kontributor/nikarashihatsu') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-user mr-3"></i>
                NikarashiHatsu
              </p>
            </a>
            <a href="{{ url('/penerbit/goalkicker') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-globe mr-3"></i>
                GoalKicker
              </p>
            </a>
            <a href="javascript:void(0)">
              <p class="mb-1 black-text">
                <i class="fas fa-tags mr-3"></i>
                244 Halaman
              </p>
            </a>
            <hr />
            <a href="javascript:void(0)">
              <p class="mb-0 black-text">
                <i class="fas fa-clock mr-3"></i>
                1 jam yang lalu
              </p>
            </a>
          </div>
        </small>
      </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3 col-xl-2">
      <div class="card mb-4">
        <small>
          <div class="card-img-top orange" style="padding: 5rem 0;"></div>
          <div class="card-body">
            <h6>JS Professional</h6>
            <hr />
            <a href="{{ url('/kontributor/nikarashihatsu') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-user mr-3"></i>
                NikarashiHatsu
              </p>
            </a>
            <a href="{{ url('/penerbit/goalkicker') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-globe mr-3"></i>
                GoalKicker
              </p>
            </a>
            <a href="javascript:void(0)">
              <p class="mb-1 black-text">
                <i class="fas fa-tags mr-3"></i>
                490 Halaman
              </p>
            </a>
            <hr />
            <a href="javascript:void(0)">
              <p class="mb-0 black-text">
                <i class="fas fa-clock mr-3"></i>
                1 jam yang lalu
              </p>
            </a>
          </div>
        </small>
      </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3 col-xl-2">
      <div class="card mb-4">
        <small>
          <div class="card-img-top indigo" style="padding: 5rem 0;"></div>
          <div class="card-body">
            <h6>PHP7 Professional</h6>
            <hr />
            <a href="{{ url('/kontributor/nikarashihatsu') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-user mr-3"></i>
                NikarashiHatsu
              </p>
            </a>
            <a href="{{ url('/penerbit/goalkicker') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-globe mr-3"></i>
                GoalKicker
              </p>
            </a>
            <a href="javascript:void(0)">
              <p class="mb-1 black-text">
                <i class="fas fa-tags mr-3"></i>
                481 Halaman
              </p>
            </a>
            <hr />
            <a href="javascript:void(0)">
              <p class="mb-0 black-text">
                <i class="fas fa-clock mr-3"></i>
                1 jam yang lalu
              </p>
            </a>
          </div>
        </small>
      </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3 col-xl-2">
      <div class="card mb-4">
        <small>
          <div class="card-img-top orange darken-1" style="padding: 5rem 0;"></div>
          <div class="card-body">
            <h6>MySQL Professional</h6>
            <hr />
            <a href="{{ url('/kontributor/nikarashihatsu') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-user mr-3"></i>
                NikarashiHatsu
              </p>
            </a>
            <a href="{{ url('/penerbit/goalkicker') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-globe mr-3"></i>
                GoalKicker
              </p>
            </a>
            <a href="javascript:void(0)">
              <p class="mb-1 black-text">
                <i class="fas fa-tags mr-3"></i>
                199 Halaman
              </p>
            </a>
            <hr />
            <a href="javascript:void(0)">
              <p class="mb-0 black-text">
                <i class="fas fa-clock mr-3"></i>
                1 jam yang lalu
              </p>
            </a>
          </div>
        </small>
      </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3 col-xl-2">
      <div class="card mb-4">
        <small>
          <div class="card-img-top green" style="padding: 5rem 0;"></div>
          <div class="card-body">
            <h6>Python Professional</h6>
            <hr />
            <a href="{{ url('/kontributor/nikarashihatsu') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-user mr-3"></i>
                NikarashiHatsu
              </p>
            </a>
            <a href="{{ url('/penerbit/goalkicker') }}">
              <p class="mb-1 black-text">
                <i class="fas fa-globe mr-3"></i>
                GoalKicker
              </p>
            </a>
            <a href="javascript:void(0)">
              <p class="mb-1 black-text">
                <i class="fas fa-tags mr-3"></i>
                816 Halaman
              </p>
            </a>
            <hr />
            <a href="javascript:void(0)">
              <p class="mb-0 black-text">
                <i class="fas fa-clock mr-3"></i>
                1 jam yang lalu
              </p>
            </a>
          </div>
        </small>
      </div>
    </div>
    <div class="col-sm-12">
      <h6 class="text-right mb-3">
        <a href="{{ url('/buku') }}" class="white-text">Lihat selengkapnya</a>
      </h6>
    </div>
  </div>
</div>
@endsection