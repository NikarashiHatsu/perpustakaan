@extends('layouts.app')
@section('content')
<div class="container-fluid elegant-color">
  <div class="row blue-gradient py-4 white-text">
    <div class="col-sm-12 col-lg-6 text-center" style="margin-top: 8rem;">
      <i class="fas {{ $content->fa_icon }} fa-5x"></i>
    </div>
    <div class="col-sm-12 col-lg-6 py-5">
      <h1>Penulis</h1>
      <hr />
      <p>{{ $content->content }}</p>
    </div>
  </div>
  <div class="row pt-4">
    <div class="col-6 col-md-6 col-lg-3">
      <div class="card bg-dark clickable white-text mb-4">
        <small>
          <div class="card-body">
            <img src="{{ asset('/img/profile_pictures/male1.jpg') }}" alt="Profile Picture"  class="w-75 mx-auto d-block z-depth-1 rounded-circle mb-3">
            <h4 class="text-center">John Doe</h4>
          </div>
          <div class="card-footer">
            <p class="mb-1">
              <i class="fas fa-book mr-3"></i>
              3 Buku
            </p>
            <p class="mb-1">
              <i class="fas fa-clock mr-3"></i>
              Bergabung pada {{ date('Y-m-d') }}
            </p>
          </div>
        </small>
      </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3">
      <div class="card bg-dark clickable white-text mb-4">
        <small>
          <div class="card-body">
            <img src="{{ asset('/img/profile_pictures/male2.jpg') }}" alt="Profile Picture"  class="w-75 mx-auto d-block z-depth-1 rounded-circle mb-3">
            <h4 class="text-center">NikarashiHatsu</h4>
          </div>
          <div class="card-footer">
            <p class="mb-1">
              <i class="fas fa-book mr-3"></i>
              4 Buku
            </p>
            <p class="mb-1">
              <i class="fas fa-clock mr-3"></i>
              Bergabung pada {{ date('Y-m-d') }}
            </p>
          </div>
        </small>
      </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3">
      <div class="card bg-dark clickable white-text mb-4">
        <small>
          <div class="card-body">
            <img src="{{ asset('/img/profile_pictures/male3.jpg') }}" alt="Profile Picture"  class="w-75 mx-auto d-block z-depth-1 rounded-circle mb-3">
            <h4 class="text-center">HatsuseIzuna</h4>
          </div>
          <div class="card-footer">
            <p class="mb-1">
              <i class="fas fa-book mr-3"></i>
              10 Buku
            </p>
            <p class="mb-1">
              <i class="fas fa-clock mr-3"></i>
              Bergabung pada {{ date('Y-m-d') }}
            </p>
          </div>
        </small>
      </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3">
      <div class="card bg-dark clickable white-text mb-4">
        <small>
          <div class="card-body">
            <img src="{{ asset('/img/profile_pictures/male4.jpg') }}" alt="Profile Picture"  class="w-75 mx-auto d-block z-depth-1 rounded-circle mb-3">
            <h4 class="text-center">Orange</h4>
          </div>
          <div class="card-footer">
            <p class="mb-1">
              <i class="fas fa-book mr-3"></i>
              2 Buku
            </p>
            <p class="mb-1">
              <i class="fas fa-clock mr-3"></i>
              Bergabung pada {{ date('Y-m-d') }}
            </p>
          </div>
        </small>
      </div>
    </div>
  </div>
</div>
@endsection