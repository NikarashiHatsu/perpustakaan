@extends('layouts.app')
@section('content')
@php($count = count($buku))
<div class="container-fluid elegant-color">
  <div class="row purple-gradient py-4 white-text">
    <div class="col-sm-12 col-lg-6 text-center my-4 my-lg-5">
      <i class="fas {{ $content->fa_icon }} fa-5x mt-lg-5 pt-lg-3"></i>
    </div>
    <div class="col-sm-12 col-lg-6 py-sm-0 py-lg-5">
      <h1>Buku</h1>
      <hr />
      <p style="text-align: justify;">{!! nl2br($content->content) !!}</p>
    </div>
  </div>
  <div class="row pt-4">
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
              <p class="mb-1 black-text">
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
              <p class="mb-1 black-text">
                <i class="fas fa-eye mr-3"></i>
                {{ count($buku->views) }}x dilihat
              </p>
              <p class="mb-0 black-text">
                <i class="fas fa-download mr-3"></i>
                {{ count($buku->downloads) }}x diunduh
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
  </div>
</div>
<form id="token">
  @csrf
  @if(isset(Auth::user()->name))
    @if(Auth::user()->jurusan == "" || Auth::user()->jurusan == NULL)
      <input type="hidden" name="jurusan" value="anonymous" />
    @else
      <input type="hidden" name="jurusan" value="{{ Auth::user()->jurusan }}" />
    @endif
  @else
    <input type="hidden" name="jurusan" value="anonymous" />
  @endif
</form>
<script>
  function relink(id) {
    var data = $("#token").serialize() + "&id_buku=" + id;

    $.ajax({
      url: "{{ url('/tambah_view') }}",
      type: 'post',
      dataType: 'json',  
      data: data,
      success: function(data) {
        if(data['success'] == 1) {
          window.location.href = "{{ url('/daftar_buku') }}" + "/" + id;
        } else {
          alert("Ada kesalahan dalam membuka buku.");
        }
      },
      error: function(data) {
        alert("Ada kesalahan dalam membuka buku.");
      }
    });
  }
</script>
@endsection