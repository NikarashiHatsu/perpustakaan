@extends('layouts.admin')
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
      url: "{{ url('/admin/list_buku') }}",
      type: 'get',
      dataType: 'html',
      success: function(data) {
        $("#listBuku").html(data);
      }
    });
  }
</script>
@endsection