@extends('layouts.book')
@section('per-page')
<div class="row">
  <div class="col-sm-8 offset-2">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-copy mr-3"></i>
        {{ $buku->book_title }} - {{ $halaman }} / {{ $buku->page_count }}
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <img class="card-image z-depth-1" style="height: 37.5rem !important; width: 100%;" src="{{ asset('/img/book_page/' . $buku->book_name . '_page_' . $halaman . '.jpg') }}" alt="">
          </div>
        </div>
        <div class="row">
          <div class="col-4 text-right">
            @if($halaman != 1)
              <a class="black-text" href="{{ url('/daftar_buku/' . $buku->id . '/' . ($halaman - 1)) }}">
                <i class="fas fa-chevron-left mt-2"></i>
              </a>
            @endif
          </div>
          <div class="col-4">
            <form id="formGetPage">
              <input type="number" name="page" class="form-control form-control-sm" min="1" max="{{ $buku->page_count }}" value="{{ $halaman }}" />
              <button type="submit" class="d-none"></button>
            </form>
          </div>
          <div class="col-4">
            @if($halaman != $buku->page_count)
              <a class="black-text" href="{{ url('/daftar_buku/' . $buku->id . '/' . ($halaman + 1)) }}">
                <i class="fas fa-chevron-right mt-2"></i>
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $("#formGetPage").submit(function(e) {
    e.preventDefault();
    page = $("input[name*='page']").val();

    if(page < 1 || page > {!! $buku->page_count !!}) {
      alert("Halaman tidak boleh kurang dari 1 dan lebih dari {!! $buku->page_count !!}.");
    } else {
      window.location.href = "{{ url('/daftar_buku/' . $buku->id) }}" + "/" + page;
    }
  });
</script>
@endsection