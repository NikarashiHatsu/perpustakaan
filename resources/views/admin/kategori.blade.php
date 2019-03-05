@extends('layouts.admin')
@section('content')
<div id="listKategori">
  <!-- List Kategori -->
</div>
<div class="row">
  <div class="col-sm-12 text-white">
    <div id="selectables" class="mb-3"></div>
    <div id="option" style="display: none;">
      <button class="btn elegant-color-dark white-text">
        <i class="fas fa-pen"></i>
      </button>
      <button class="btn elegant-color-dark white-text">
        <i class="fas fa-trash"></i>
      </button>
      <button id="selectAll" class="btn elegant-color-dark white-text">
        <i class="fas fa-check-square"></i>
      </button>
    </div>
  </div>
</div>
<script>
  $().ready(function() {
    load_kategori();
  });

  function load_kategori() {
    $.ajax({
      url: "{{ url('/admin/list_kategori') }}",
      type: 'get',
      dataType: 'html',
      success: function(data) {
        $("#listKategori").html(data);
      }
    });
  }
</script>
@endsection