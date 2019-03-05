@extends('layouts.admin')
@section('content')
<div id="listSubKategori">
  <!-- List Sub-Kategori -->
</div>
<script>
  $().ready(function() {
    load_subkategori();
  });

  function load_subkategori() {
    $.ajax({
      url: "{{ url('/admin/list_subkategori') }}",
      type: 'get',
      dataType: 'html',
      success: function(data) {
        $("#listSubKategori").html(data);
      }
    });
  }
</script>
@endsection