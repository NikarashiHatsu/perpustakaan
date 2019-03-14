@extends('layouts.penulis')
@section('content')
<div id="listBuku">
  <!-- List Buku -->
</div>
<script>
  $().ready(function() {
    load_buku();
  });

  function load_buku() {
    $.ajax({
      url: "{{ url('/penulis/list_buku') }}",
      type: 'get',
      dataType: 'html',
      success: function(data) {
        $("#listBuku").html(data);
      },
      error: function(data) {
        alert("Ada kesalahan pada server.");
      }
    });
  }
</script>
@endsection