@extends('layouts.app')
@section('content')
@php($count = count($buku))
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
  @if($count > 0)
    <div class="row mb-3 pt-4">
      <div class="col-sm-12">
        <h3 class="white-text">Terbaru</h3>
      </div>
    </div>
  @endif
  <div class="row">
    @php($id = 1)
    @forelse($buku as $buku)
      <div class="col-6 col-md-6 col-lg-3 col-xl-2">
        <div class="card mb-4">
          <small>
            <img class="card-image-thumbnail" style="height: 17.5rem !important; width: 100%;" src="{{ asset('/img/book_page/' . $buku->book_name . '_page_1.jpg') }}" alt="">
            <div class="card-body">
              <a href="{{ url('/daftar_buku/' . $buku->id) }}" class='black-text'>
                <h6>{{ mb_strimwidth($buku->book_title, 0, 20, '...') }}</h6>
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
              <p class="mb-1 black-text">
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
      <div class="col-12 white-text p-5">
        <table class="d-block mx-auto" style="width: max-content;">
          <tbody>
            <tr>
              <td>
                <h4>
                  <i class="far fa-sad-tear fa-5x mr-5"></i>
                </h4>
              </td>
              <td>
                <h4>
                  Belum ada buku yang diunggah
                </h4>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    @endforelse
    <div class="col-sm-12">
      @if($count > 6)
        <h6 class="text-right mb-3">
          <a href="{{ url('/buku') }}" class="white-text">Lihat selengkapnya</a>
        </h6>
      @endif
    </div>
  </div>
</div>
@endsection