@extends('layouts.admin')
@section('content')
<div id="listPenulis">
  <!-- List Penulis -->
</div>
<script>
  $().ready(function() {
    load_penulis();
  });

  function load_penulis() {
    $.ajax({
      url: "{{ url('/admin/list_penulis') }}",
      type: 'get',
      dataType: 'html',
      success: function(data) {
        $("#listPenulis").html(data);
      },
      error: function(data) {
        alert("Ada kesalahan pada server.");
      }
    });
  }
</script>
@endsection