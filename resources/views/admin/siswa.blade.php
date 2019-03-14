@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-8">
    <div class="card bg-dark white-text mb-3">
      <div class="card-header">
        <i class="fas fa-search mr-3"></i>
        Cari Siswa
      </div>
      <div class="card-body pb-0">
        <div class="row">
          <div class="col-sm-12 mb-3 col-md-4">
            <select name="kelas" class="form-control form-control-sm">
              <option value="" hidden disabled selected>--Pilih Kelas--</option>
              <option value="XII">Kelas XII</option>
              <option value="XI">Kelas XI</option>
              <option value="X">Kelas X</option>
            </select>
          </div>
          <div class="col-sm-12 mb-3 col-md-4">
            <select name="jurusan" class="form-control form-control-sm">
              <option value="" hidden disabled selected>--Pilih Jurusan--</option>
              <option value="akuntansi_dan_keuangan_lembaga">Akuntansi dan Keuangan Lembaga</option>
              <option value="bisnis_daring_pemasaran">Bisnis Daring Pemasaran</option>
              <option value="multimedia">Multimedia</option>
              <option value="otomatisasi_dan_tata_kelola_perkantoran">Otomatisasi dan Tata Kelola Perkantoran</option>
              <option value="perbankan_dan_keuangan_mikro">Perbankan dan Keuangan Mikro</option>
              <option value="usaha_perjalanan_wisata">Usaha Perjalanan Wisata</option>
            </select>
          </div>
          <div class="col-sm-12 mb-3 col-md-4">
            <select name="rombel" id="" class="form-control form-control-sm">
              <option value="" hidden disabled selected>--Pilih Rombongan Belajar--</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="alert" class="col-sm-12 col-md-12 col-lg-4">
    <!-- Alert -->
  </div>
</div>
<hr class="mt-0" />
<div id="listSiswa">
  <!-- List Siswa -->
</div>
<script>
  $().ready(function() {
    var kelasSelect = $("select[name*='kelas']");
        jurusanSelect = $("select[name*='jurusan']");
        rombelSelect = $("select[name*='rombel']");
        kelasValue = undefined;
        jurusanValue = undefined;
        rombelValue = undefined;
    
    kelasSelect.change(function() {
      kelasValue = $(this).val();
      search();
    });
    jurusanSelect.change(function() {
      jurusanValue = $(this).val();
      search();
    });
    rombelSelect.change(function() {
      rombelValue = $(this).val();
      search();
    });

    function search() {
      if ((kelasValue != undefined) && (jurusanValue != undefined) && (rombelValue != undefined)) {
        var data = {
          'kelas': $("select[name*='kelas']").val(),
          'jurusan': $("select[name*='jurusan']").val(),
          'rombel': $("select[name*='rombel']").val(),
        }

        $.ajax({
          url: "{{ url('/admin/list_siswa') }}",
          data: data,
          type: 'get',
          dataType: 'html',
          success: function(data) {
            $("#listSiswa").html(data);
          },
          error: function(data) {
            alert("Ada kesalahan pada server.");
          }
        });
      }
    }
  });
</script>
@endsection