@extends('layouts.siswa')
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="card bg-dark white-text text-center clickable waves-effect" data-toggle="modal" data-target="#modalChangePassword">
      <div class="card-body">
        <i class="fas fa-lock fa-3x mt-3"></i>
        <h4 class="mt-3">Ganti Kata Sandi</h4>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content" style="border-radius: 5px; -webkit-border-radius: 5px;">
        <div class="modal-header">
          <h4 class="modal-title w-100">Ganti Kata Sandi</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formChangePassword">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" name="old_password" class="form-control" placeholder="Kata Sandi Lama" />
                  <div class="input-group-append" data-toggle="tooltip" title="Silahkan isi input ini">
                    <span class="input-group-text bg-success white-text" id="responseOldPassword">
                      <i class="fas fa-info"></i>
                    </span>
                  </div>
                </div>
                <hr style='border-top: 1px solid rgba(0, 0, 0, .1) !important;' />
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" name="new_password" class="form-control" placeholder="Kata Sandi Baru" />
                  <div class="input-group-append">
                    <span class="input-group-text bg-success white-text" data-toggle="tooltip" title="Silahkan isi input ini" id="responseNewPassword">
                      <i class="fas fa-info"></i>
                    </span>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-unlock"></i>
                    </span>
                  </div>
                  <input type="password" name="confirm_new_password" class="form-control" placeholder="Konfirmasi Kata Sandi Baru" />
                  <div class="input-group-append">
                    <span class="input-group-text bg-success white-text" data-toggle="tooltip" title="Silahkan isi input ini" id="responseConfirmNewPassword">
                      <i class="fas fa-info"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-green btn-sm">
              <i class="fas fa-save mr-3"></i>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $().ready(function() {
    $("#formChangePassword").submit(function(e) {
      e.preventDefault();

      var passthru = 1;
      var data = $(this).serializeArray();
          obj = {};

      $(data).each(function(i, field) {
        obj[field.name] = field.value;
      });

      if(obj['old_password'].length < 4) {
        passthru = 0;
        $("#responseOldPassword").addClass("bg-danger").removeClass("bg-success").attr("title", "Isi kata sandi minimal 4 karakter");
      } else {
        $("#responseOldPassword").addClass("bg-success").removeClass("bg-danger").attr("title", "Oke");
      }
      if(obj['new_password'].length < 4) {
        passthru = 0;
        $("#responseNewPassword").addClass("bg-danger").removeClass("bg-success").attr("title", "Isi kata sandi minimal 4 karakter");
      } else {
        $("#responseNewPassword").addClass("bg-success").removeClass("bg-danger").attr("title", "Oke");
      }
      if(obj['confirm_new_password'].length < 4) {
        passthru = 0;
        $("#responseConfirmNewPassword").addClass("bg-danger").removeClass("bg-success").attr("title", "Isi kata sandi minimal 4 karakter");
      } else {
        $("#responseConfirmNewPassword").addClass("bg-success").removeClass("bg-danger").attr("title", "Oke");
      }

      if(obj['new_password'].length > 4 && obj['confirm_new_password'].length > 4) {
        if(obj['new_password'] === obj['confirm_new_password']) {
          $("#responseNewPassword").addClass("bg-success").removeClass("bg-danger").attr("title", "Kata sandi sama");
          $("#responseConfirmNewPassword").addClass("bg-success").removeClass("bg-danger").attr("title", "Kata sandi sama");
        } else {
          passthru = 0;
          $("#responseNewPassword").addClass("bg-danger").removeClass("bg-success").attr("title", "Kata sandi baru harus sama dengan field konfirmasi");
          $("#responseConfirmNewPassword").addClass("bg-danger").removeClass("bg-success").attr("title", "Kata sandi baru harus sama dengan field konfirmasi");
        }
      }


      if(passthru == 1) {
        var data = $(this).serialize();
        $.ajax({
          url: "{{ url('/siswa/change_password') }}",
          type: 'post',
          data: data,
          dataType: 'json',
          success: function(data) {
            if (data['success'] == 0) {
              $("#responseOldPassword").addClass("bg-danger").removeClass("bg-success").attr("title", data['old_password_response']);
            } else {
              alert("Berhasil mengubah kata sandi, silahkan login kembali.");
              $("#logoutForm").submit();
            }
          },
          error: function(data) {
            alert("Ada kesalahan pada server.");
          }
        });
      }
    });
  });
</script>
@endsection