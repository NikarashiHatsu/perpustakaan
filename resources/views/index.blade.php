@extends('layouts.app')
@section('content')
<div class="container-fluid peach-gradient py-4 white-text">
  <div class="row">
    <div class="col-sm-12 col-lg-6 text-center my-4 my-lg-5">
      <i class="fas {{ $content->fa_icon }} fa-5x mt-lg-5 pt-lg-3"></i>
    </div>
    <div class="col-sm-12 col-lg-6 py-sm-0 py-lg-5">
      <h1>{{ config('app.name') }}</h1>
      <hr />
      <p style="text-align: justify;">{!! nl2br($content->content) !!}</p>
    </div>
  </div>
</div>
<div class="container-fluid elegant-color py-5 white-text">
  <div class="row">
    <div class="col-sm-12 text-center">
      <h3 class="my-5">-Insert Random Quote Here-</h3>
    </div>
  </div>
</div>
<div class="container-fluid purple-gradient py-3 white-text">
  <div class="row">
    <div class="col-sm-12 text-center my-5">
      <h2 class="m-md-2"><i class="fas {{ $content_buku->fa_icon }} fa-1x mr-5"></i>Jelajah Buku</h2>
    </div>
  </div>
</div>
<div class="container-fluid elegant-color pt-4 white-color">
  <div class="row">
    @php($id = 1)
    @forelse($buku as $buku)
      <div class="col-sm-12 col-md-6 col-lg-3 col-xl-2">
        <div class="card mb-4">
          <small>
            <img class="card-image-thumbnail" style="width: 100%;" src="{{ asset('/img/book_page/' . $buku->book_name . '_page_1.jpg') }}" alt="">
            <div class="card-body">
              <a onclick="relink({!! $buku->id !!})" class='black-text'>
                <h6 class="truncate">{{ mb_strimwidth($buku->book_title, 0, 100, '...') }}</h6>
              </a>
              <hr style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important;' class="my-2" />
              <a href="{{ url('/kontributor/nikarashihatsu') }}">
                <p class="mb-1 black-text">
                  <i class="fas fa-user mr-3"></i>
                  <span class="badge badge-pills elegant-color">{{ $buku->user->name }}</span>
                </p>
              </a>
              <p class="mb-1 black-text">
                <i class="fas fa-globe mr-3"></i>
                {{ $buku->publisher }}
              </p>
              <p class="mb-1 black-text">
                <i class="fas fa-copy mr-3"></i>
                {{ $buku->page_count }} Halaman
              </p>
              <p class="mb-1 black-text categories-wrapper">
                <i class="fas fa-tags mr-3"></i>
                @php($subcategories = explode(',', $buku->subcategory_ids))
                @for($i = 0; $i < count($subcategories); $i++)
                  @php($subcategory = App\Subcategory::find($subcategories[$i]))
                  <a href="{{ url('/kategori/' . strtolower(str_replace(' ', '_', $subcategory->subcategory_name))) }}">
                    <span class="badge badge-pills {{ $subcategory->category->color_scheme }}">{{ ucwords(str_replace('_', ' ', $subcategory->subcategory_name)) }}</span>
                  </a>
                @endfor
              </p>
              <hr style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important;' class="my-2" />
              <p class="mb-0 black-text">
                <i class="fas fa-clock mr-3"></i>
                <span id="time{{ $id }}" style="text-transform: capitalize;"></span>
                @php($time = explode(',', str_replace(' ', ',', str_replace('-', ' ', str_replace(':', ' ', $buku->created_at)))))
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
      </div>
      @php($id++)
    @empty
      <div class="col-12 white-text p-5 text-center">
        <h4 class="mb-5">
          <i class="far fa-sad-tear fa-4x"></i>
        </h4>
        <h4>
          Belum ada buku yang diunggah
        </h4>
      </div>
    @endforelse
    <div class="col-sm-12">
      @if($count_buku > 6)
        <h6 class="text-right mb-4">
          <a href="{{ url('/daftar_buku') }}" class="white-text">Lihat selengkapnya</a>
        </h6>
      @endif
    </div>
  </div>
</div>
<div class="container-fluid blue-gradient py-3 white-text">
  <div class="row">
    <div class="col-sm-12 text-center my-5">
      <h2 class="m-md-2"><i class="fas {{ $content_penulis->fa_icon }} fa-1x mr-5"></i>Jelajah Penulis</h2>
    </div>
  </div>
</div>
<div class="container-fluid elegant-color pt-4 white-color">
  <div class="row">
    @forelse($penulis as $penulis)
      <div class="col-sm-12 col-md-6 col-lg-3">
        <a href="{{ url('/daftar_penulis/' . $penulis->id) }}">
          <div class="card bg-dark clickable white-text mb-4">
            <small>
              <div class="card-body">
                @if($penulis->profile_picture == NULL)
                  <p class="text-center mx-auto my-0">
                    <i style="font-size: 7.5rem;" class="fas fa-user-circle mb-3"></i>
                  </p>
                @else
                  <img style="width: 7.5rem;" src="{{ asset('/img/profile_pictures/' . $penulis->profile_picture) }}" alt="Profile Picture"  class="mx-auto d-block z-depth-1 rounded-circle mb-3">
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
    <div class="col-sm-12">
      @if($count_penulis > 4)
        <h6 class="text-right mb-4">
          <a href="{{ url('/daftar_penulis') }}" class="white-text">Lihat selengkapnya</a>
        </h6>
      @endif
    </div>
  </div>
</div>
@endsection