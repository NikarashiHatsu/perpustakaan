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
      <p style="text-align: justify;">{!! $content->content !!}</p>
    </div>
  </div>
  <div class="row pt-4">
    @php($id = 1)
    @forelse($penulis as $penulis)
      <div class="col-sm-12 col-md-6 col-lg-3">
        <a href="{{ url('/daftar_penulis/' . $penulis->id) }}">
          <div class="card bg-dark clickable white-text mb-4">
            <small>
              <div class="card-body">
                @if($penulis->profile_picture == NULL)
                  <p class="text-center mx-auto my-0">
                    <i style="font-size: 12.75rem;" class="fas fa-user-circle mb-3"></i>
                  </p>
                @else
                  <img src="{{ asset('/img/profile_pictures/male1.jpg') }}" alt="Profile Picture"  class="w-75 mx-auto d-block z-depth-1 rounded-circle mb-3">
                @endif
                <h4 class="text-center">{{ $penulis->name }}</h4>
              </div>
              <div class="card-footer">
                <p class="mb-1">
                  <i class="fas fa-book mr-3"></i>
                  {{ count($penulis->books) }} Buku
                </p>
                <p class="mb-1">
                  <i class="fas fa-clock mr-3"></i>
                  Bergabung <span id="time{{ $id }}" style="text-transform: capitalize;"></span>
                  @php($time = explode(',', str_replace(' ', ',', str_replace('-', ' ', str_replace(':', ' ', $penulis->created_at)))))
                  @php($time[1] = $time[1] - 1)
                  @php($time = implode(',', $time))
                  <script>
                    moment.locale('id');
                    $("#time{{ $id }}").html(moment([{{ $time }}]).fromNow())
                  </script>
                </p>
              </div>
            </small>
          </div>
        </a>
      </div>
      @php($id++)
    @empty
    @endforelse
  </div>
</div>
@endsection