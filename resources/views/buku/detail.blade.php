@extends('layouts.book')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-book mr-3"></i>
    {{ $buku->book_title }}
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-4 mb-3 mb-lg-0">
        <img class="card-image-thumbnail" style="height: 20rem !important; width: 100%;" src="{{ asset('/img/book_page/' . $buku->book_name . '_page_1.jpg') }}" alt="">
      </div>
      <div class="col-sm-8 mb-sm-3 mb-md-0">
        <h2 class="card-title">{{ $buku->book_title }}</h2>
        <hr />
        <a href="{{ url('/kontributor/nikarashihatsu') }}">
          <p class="mb-1 black-text">
            <i class="fas fa-user mr-3"></i>
            <span class="badge badge-pills elegant-color">
              {{ $buku->user->name }}
            </span>
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
        <hr />
        <p class="mb-1">
          <i class="fas fa-tags mr-3"></i>
          @php($subcategories = explode(',', $buku->subcategory_ids))
          @for($i = 0; $i < count($subcategories); $i++)
            @php($subcategory = App\Subcategory::find($subcategories[$i]))
            <a href="{{ url('/kategori/' . $subcategory->category_name) }}">
              <span class="badge badge-pills {{ $subcategory->category->color_scheme }}">{{ ucwords(str_replace('_', ' ', $subcategory->subcategory_name)) }}</span>
            </a>
          @endfor
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
@section('statistic')
<div class="card">
  <div class="card-header">
    <i class="fas fa-chart-line mr-3"></i>
    Statistik
  </div>
  <div class="card-body">
    <p class="mb-1">
      <i class="fas fa-eye mr-3"></i>
      10x dilihat
    </p>
    <p class="mb-1">
      <i class="fas fa-download mr-3"></i>
      10x diunduh
    </p>
  </div>
</div>
@endsection
@section('pages')
<div class="card">
  <div class="card-header">
    <i class="fas fa-copy mr-3"></i>
    Konten Buku
  </div>
  <div class="card-body pb-0">
    <div class="row">
      @for($i = 1; $i <= $buku->page_count; $i++)
        <div class="col-sm-6 col-lg-4 mb-4" style="background-color: white;">
          <a href="{{ url('/daftar_buku/' . $buku->id . '/' . $i) }}">
            <img class="card-image z-depth-1" style="height: 20rem !important; width: 100%;" src="{{ asset('/img/book_page/' . $buku->book_name . '_page_' . $i . '.jpg') }}" alt="">
          </a>
        </div>
      @endfor
    </div>
  </div>
</div>
@endsection