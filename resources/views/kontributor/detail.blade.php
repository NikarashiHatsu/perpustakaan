@extends('layouts.app')
@section('content')
<div class="container-fluid elegant-color">
  <div class="row justify-content-md-center blue-gradient py-4 white-text">
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-dark">
        <div class="card-body">
          @if($penulis->profile_picture == NULL)
            <p class="text-center mx-auto my-0">
              <i style="font-size: 7.5rem;" class="fas fa-user-circle mb-3"></i>
            </p>
          @else
            <img src="{{ asset('/img/profile_pictures/' . $penulis->profile_picture) }}" alt="Profile Picture" style="width: 7.5rem; height: 7.5rem;" class="mx-auto d-block z-depth-1 rounded-circle mb-3">
          @endif
          <h4 class="text-center">{{ $penulis->name }}</h4>
          <hr />
          <p class="mb-1">
            <i class="fas fa-book mr-3"></i>
            {{ count($penulis->books) }} Buku
          </p>
          <p class="mb-1">
            <i class="fas fa-eye mr-3"></i>
            Bukunya sudah dilihat {{ $lihat_akumulatif }}x tahun ini
          </p>
          <p class="mb-0">
            <i class="fas fa-download mr-3"></i>
            Bukunya sudah diunduh {{ $unduh_akumulatif }}x tahun ini
          </p>
        </div>
        <div class="card-footer">
          <i class="fas fa-clock mr-3"></i>
          <span id="time" style="text-transform: capitalize;"></span>
          @php($time = explode(',', str_replace(' ', ',', str_replace('-', ' ', str_replace(':', ' ', $penulis->created_at)))))
          @php($time[1] = $time[1] - 1)
          @php($time = implode(',', $time))
          <script>
            moment.locale('id');
            $("#time").html("Bergabung " + moment([{{ $time }}]).fromNow())
          </script>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    @php($id = 1)
    @forelse($penulis->books as $buku)
      <div class="col-sm-12 col-md-6 col-lg-3 col-xl-2 pt-4">
        <div class="card mb-4">
          <small>
            <img class="card-image-thumbnail" style="width: 100%;" src="{{ asset('/img/book_page/' . $buku->book_name . '_page_1.jpg') }}" alt="">
            <div class="card-body">
              <a onclick="relink({!! $buku->id !!})" class='black-text'>
                <h6 class="truncate">{{ mb_strimwidth($buku->book_title, 0, 100, '...') }}</h6>
              </a>
              <hr style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important;' class="my-2" />
              <a href="{{ url('/penulis/nikarashihatsu') }}">
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
          <i class="far fa-sad-tear fa-5x"></i>
        </h4>
        <h4>
          Belum ada buku yang diunggah
        </h4>
      </div>
    @endforelse
  </div>
</div>
@endsection