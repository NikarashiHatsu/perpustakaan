@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-6 col-lg-4 mb-lg-4 mb-4">
    <div class="card bg-dark white-text text-center clickable waves-effect" data-toggle="modal" data-target="#modalChangeIndex">
      <div class="card-body">
        <i class="fas fa-home fa-3x mt-3"></i>
        <h4 class="mt-3">Ubah Deskripsi Halaman Utama</h4>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 mb-lg-4 mb-4">
    <div class="card bg-dark white-text text-center clickable waves-effect" data-toggle="modal" data-target="#modalChangeBook">
      <div class="card-body">
        <i class="fas fa-book fa-3x mt-3"></i>
        <h4 class="mt-3">Ubah Deskripsi Halaman Daftar Buku</h4>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 mb-lg-4 mb-4">
    <div class="card bg-dark white-text text-center clickable waves-effect" data-toggle="modal" data-target="#modalChangeWriter">
      <div class="card-body">
        <i class="fas fa-user fa-3x mt-3"></i>
        <h4 class="mt-3">Ubah Deskripsi Halaman Daftar Penulis</h4>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 mb-lg-4 mb-4">
    <div class="card bg-dark white-text text-center clickable waves-effect" data-toggle="modal" data-target="#modalChangeFooter">
      <div class="card-body">
        <i class="fas fa-info fa-3x mt-3"></i>
        <h4 class="mt-3">Ubah Informasi Footer</h4>
      </div>
    </div>
  </div>
</div>
<hr style="border-top: 1px solid rgba(255, 255, 255, 0.1);" class="mt-0" />
<div class="row">
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="card bg-dark white-text text-center clickable waves-effect" data-toggle="modal" data-target="#modalChangePassword">
      <div class="card-body">
        <i class="fas fa-lock fa-3x mt-3"></i>
        <h4 class="mt-3">Ubah Kata Sandi</h4>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="card bg-dark white-text text-center clickable waves-effect" data-toggle="modal" data-target="#modalChangeAccessCode">
      <div class="card-body">
        <i class="fas fa-id-card fa-3x mt-3"></i>
        <h4 class="mt-3">Ubah Kode Akses</h4>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="card bg-dark white-text text-center clickable waves-effect" data-toggle="modal" data-target="#modalChangeProfilePicture">
      <div class="card-body">
        <i class="fas fa-image fa-3x mt-3"></i>
        <h4 class="mt-3">Ganti Foto Profil</h4>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalChangeProfilePicture" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content" style="border-radius: 5px; -webkit-border-radius: 5px;">
        <div class="modal-header">
          <h4 class="modal-title w-100">Ganti Foto Profil</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span class="fas fa-times"></span>
          </button>
        </div>
        <form id="formChangeProfilePicture" enctype="multipart/formdata">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="row px-3 mb-3">
              <div class="col-sm-8 offset-sm-2" style="border: 5px dashed #BBB;" id="preview">
                <h3 class="text-center my-5 py-5" style="color: #BBB !important;">Belum ada pratinjau</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" name="upload" id="customFile" class="custom-file-input" required />
                    <label for="customFile" class="custom-file-label" id="customFileLabel">Pilih foto</label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" name="password_reconfirm" class="form-control" placeholder="Masukkan kata sandi" />
                </div>
              </div>
            </div>
            <div class="alert alert-danger d-none" id="previewAlert">
            
            </div>
            <hr class="mt-0" style="border-top: 1px solid rgba(0, 0, 0, 0.1) !important;" />
            <div class="row">
              <div class="col-sm-12">
                <p class='mb-1'>Ketentuan:</p>
                <ol class='pl-4 mb-0'>
                  <li class='mb-1'>Foto berekstensi .jpeg</li>
                  <li class="mb-1">Ukuran foto tidak melebihi 1mb</li>
                  <li class="mb-1">Foto memiliki rasio 1:1</li>
                  <li class="mb-1">Dimensi foto tidak melebihi 800x800</li>
                </ol>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-green btn-sm" type="submit" id="buttonChangeProfile" disabled>
              <i class="fas fa-save mr-3"></i>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content" style="border-radius: 5px; -webkit-border-radius: 5px;">
        <div class="modal-header">
          <h4 class="modal-title w-100">Ubah Kata Sandi</h4>
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
                <div class="input-group">
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
  <div class="modal fade" id="modalChangeAccessCode" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content" style="border-radius: 5px; -webkit-border-radius: 5px;">
        <div class="modal-header">
          <h4 class="modal-title w-100">Ubah Kode Akses</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formChangeAccessCode">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-id-card"></i>
                    </span>
                  </div>
                  <input type="text" name="old_access_code" class="form-control" placeholder="Kode Akses Lama" />
                  <div class="input-group-append" data-toggle="tooltip" title="Silahkan isi input ini">
                    <span class="input-group-text bg-success white-text" id="responseOldAccessCode">
                      <i class="fas fa-info"></i>
                    </span>
                  </div>
                </div>
                <hr style='border-top: 1px solid rgba(0, 0, 0, .1) !important;' />
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-id-card"></i>
                    </span>
                  </div>
                  <input type="text" name="new_access_code" class="form-control" placeholder="Kode Akses Baru" />
                  <div class="input-group-append">
                    <span class="input-group-text bg-success white-text" data-toggle="tooltip" title="Silahkan isi input ini" id="responseNewAccessCode">
                      <i class="fas fa-info"></i>
                    </span>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-id-card"></i>
                    </span>
                  </div>
                  <input type="text" name="confirm_new_access_code" class="form-control" placeholder="Konfirmasi Kode Akses Baru" />
                  <div class="input-group-append">
                    <span class="input-group-text bg-success white-text" data-toggle="tooltip" title="Silahkan isi input ini" id="responseConfirmNewAccessCode">
                      <i class="fas fa-info"></i>
                    </span>
                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" name="confirm_password" class="form-control" placeholder="Masukkan Kata Sandi" />
                  <div class="input-group-append">
                    <span class="input-group-text bg-success white-text" data-toggle="tooltip" title="Silahkan isi input ini" id="responseConfirmPassword">
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
  <div class="modal fade" id="modalChangeIndex">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100">Ubah Deskripsi Halaman Utama</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formChangeIndex">
          @csrf
          @method('PUT')
          <input type="hidden" name="target" value="{{ $index_content->setting_for }}" />
          <div class="modal-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fab fa-font-awesome"></i>
                </span>
              </div>
              <input type="text" name="fa_icon" class="form-control" placeholder="Ikon Font Awesome" value="{{ $index_content->fa_icon }}" required="required">
            </div>
            <textarea name="description" cols="30" rows="10" class="form-control mb-3" required="required">{{ $index_content->content }}</textarea>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" required="required">
            </div>
          </div>
          <div class="modal-footer">
            <button type='submit' class="btn btn-green btn-sm white-text ml-auto">
              <i class="fas fa-save mr-3"></i>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalChangeBook">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100">Ubah Deskripsi Halaman Daftar Buku</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formChangeBook">
          @csrf
          @method('PUT')
          <input type="hidden" name="target" value="{{ $book_content->setting_for }}" />
          <div class="modal-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fab fa-font-awesome"></i>
                </span>
              </div>
              <input type="text" name="fa_icon" class="form-control" placeholder="Ikon Font Awesome" value="{{ $book_content->fa_icon }}" required="required">
            </div>
            <textarea name="description" cols="30" rows="10" class="form-control mb-3" required="required">{{ $book_content->content }}</textarea>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" required="required">
            </div>
          </div>
          <div class="modal-footer">
            <button type='submit' class="btn btn-green btn-sm white-text ml-auto">
              <i class="fas fa-save mr-3"></i>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalChangeWriter">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100">Ubah Deskripsi Halaman Daftar Penulis</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formChangeWriter">
          @csrf
          @method('PUT')
          <input type="hidden" name="target" value="{{ $writer_content->setting_for }}" />
          <div class="modal-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fab fa-font-awesome"></i>
                </span>
              </div>
              <input type="text" name="fa_icon" class="form-control" placeholder="Ikon Font Awesome" value="{{ $writer_content->fa_icon }}" required="required">
            </div>
            <textarea name="description" cols="30" rows="10" class="form-control mb-3" required="required">{{ $writer_content->content }}</textarea>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" required="required">
            </div>
          </div>
          <div class="modal-footer">
            <button type='submit' class="btn btn-green btn-sm white-text ml-auto">
              <i class="fas fa-save mr-3"></i>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalChangeFooter">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100">Ubah Informasi Footer</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formChangeFooter">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fab fa-facebook"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="facebook" placeholder="https://facebook.com/" value="{{ $facebook->value }}" />
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fab fa-twitter"></i>
                </span>
              </div>
              <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com" value="{{ $twitter->value }}" />
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fab fa-instagram"></i>
                </span>
              </div>
              <input type="text" name="instagram" class="form-control" placeholder="https://instagram.com/" value="{{ $instagram->value }}" />
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" required="required" />
            </div>
          </div>
          <div class="modal-footer">
            <button type='submit' class="btn btn-green btn-sm white-text ml-auto">
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
    $("#customFile").on('change', function() {
      var string = $(this).prop('files')[0];
      
      if(string == undefined) {
        $("#buttonChangeProfile").attr("disabled", true);
        $("#preview").html('<h3 class="text-center my-5 py-5" style="color: #BBB !important;">Belum ada pratinjau</h3>');
        $("#customFileLabel").html("Pilih foto");
        $("#previewAlert").addClass('d-none').removeClass('d-block').html("");
      } else {
        type = string['type'];
        size = string['size'];
        passes = 1;
        response = "<ul class='mb-0 pl-3'>";
        
        // Cek 1
        if (type != 'image/jpeg') {
          passes = 0;
          response += "<li>File bukan berekstensi .jpeg</li>";
        }
        // Cek 2
        if (size > 1024000) {
          passes = 0;
          response += "<li>File tidak boleh melebihi 1mb.</li>";
        }

        if (passes == 1) {
          var passes = 1;
              response = "";
          var image = new Image();
              image.src = window.URL.createObjectURL(string);
              image.onload = function() {
                var width = this.width;
                    height = this.height;
                    ratioWidth = this.width / this.height;
                    ratioHeight = this.height / this.width;
                    if (ratioWidth > 0.9 && ratioWidth < 1.1) {
                      ratioWidth = 1;
                    }
                    if (ratioHeight > 0.9 && ratioHeight < 1.1) {
                      ratioHeight = 1;
                    }
                    ratio = ratioWidth + ":" + ratioHeight;
                    
                //===============================================================
                if(ratio != "1:1") {
                  passes = 0;
                  response += "<li>Rasio foto harus 1:1</li>";
                }
                if(width > 800 || height > 800) {
                  passes = 0;
                  response += "<li>Panjang dan lebar foto harus kurang dari 800 pixel</li>";
                }

                if(passes == 0) {
                  $("#buttonChangeProfile").attr("disabled", true);
                  $("#previewAlert").addClass('d-block').removeClass('d-none').html(response);
                  $("#preview").addClass('p-3');
                } else {
                  $("#buttonChangeProfile").removeAttr("disabled");
                  $("#preview").html("<img class='w-100 z-depth-1' src='" + image.src + "' />");
                  $("#preview").addClass('p-3');
                  $("#previewAlert").addClass('d-none').removeClass('d-block');
                  $("#customFileLabel").html(string['name']);
                }
              }
        } else {
          $("#buttonChangeProfile").attr("disabled", true);
          $("#preview").html('<h3 class="text-center my-5 py-5" style="color: #BBB !important;">Belum ada pratinjau</h3>');
          $("#customFileLabel").html("Pilih foto");
          $("#previewAlert").addClass('d-block').removeClass('d-none').html(response);
        }
      }
    });
    $("#formChangeProfilePicture").submit(function(e) {
      e.preventDefault();

      var data = new FormData(this);

      if($("#previewAlert")[0].className.search('d-none') > 1) {
        $.ajax({
          url: "{{ url('/admin/foto_profil') }}",
          type: 'post',
          dataType: 'json',
          data: data,
          enctype: 'multipart/form-data',
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data['success'] == 1) {
              $("#modalChangeProfilePicture").modal('hide');
              setTimeout(function() {
                location.reload();
              }, 1000);
            } else {
              alert("Kata sandi salah.");
            }
          },
          error: function(data) {
            alert("Ada kesalahan pada server.");
          }
        });
      } else {
        alert("Pilih foto terlebih dahulu.");
      }
    });
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
        if(obj['new_password'] == obj['confirm_new_password']) {
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
          url: "{{ url('/admin/change_password') }}",
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

    $("#formChangeAccessCode").submit(function(e) {
      e.preventDefault();

      var passthru = 1;
      var data = $(this).serializeArray();
          obj = {};

      $(data).each(function(i, field) {
        obj[field.name] = field.value;
      });

      if(obj['old_access_code'].length < 4) {
        passthru = 0;
        $("#responseOldAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", "Isi kode akses minimal 4 karakter");
      } else {
        $("#responseOldAccessCode").addClass("bg-success").removeClass("bg-danger").attr("title", "Oke");
      }
      if(obj['new_access_code'].length < 4) {
        passthru = 0;
        $("#responseNewAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", "Isi kode akses minimal 4 karakter");
      } else {
        $("#responseNewAccessCode").addClass("bg-success").removeClass("bg-danger").attr("title", "Oke");
      }
      if(obj['confirm_new_access_code'].length < 4) {
        passthru = 0;
        $("#responseConfirmNewAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", "Isi kode akses minimal 4 karakter");
      } else {
        $("#responseConfirmNewAccessCode").addClass("bg-success").removeClass("bg-danger").attr("title", "Oke");
      }
      if(obj['confirm_password'].length < 4) {
        passthru = 0;
        $("#responseConfirmPassword").addClass("bg-danger").removeClass("bg-success").attr("title", "Isi kata sandi minimal 4 karakter");
      } else {
        $("#responseConfirmPassword").addClass("bg-success").removeClass("bg-danger").attr("title", "Oke");
      }

      if((obj['new_access_code'].length > 4) && (obj['confirm_new_access_code'].length > 4)) {
        if(obj['new_access_code'] == obj['confirm_new_access_code']) {
          $("#responseNewAccessCode").addClass("bg-success").removeClass("bg-danger").attr("title", "Kode akses sama");
          $("#responseConfirmNewAccessCode").addClass("bg-success").removeClass("bg-danger").attr("title", "Kode akses sama");
        } else {
          passthru = 0;
          $("#responseNewAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", "Kode akses baru harus sama dengan field konfirmasi");
          $("#responseConfirmNewAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", "Kode akses baru harus sama dengan field konfirmasi");
        }
      }

      if(passthru == 1) {
        var data = $(this).serialize();
        $.ajax({
          url: "{{ url('/admin/change_access_code') }}",
          type: 'post',
          data: data,
          dataType: 'json',
          success: function(data) {
            if (data['response'] == 0) {
              if (data['success'] == 0) {
                $("#responseOldAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", data['old_access_code_response']);
              } else {
                alert("Berhasil mengubah kode akses, silahkan login kembali.");
                $("#logoutForm").submit();
              }
            } else if (data['response'] == 1) {
              $("#responseConfirmPassword").addClass("bg-danger").removeClass("bg-success").attr("title", data['password_response']);
            } else if (data['response'] == 2) {
              $("#responseOldAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", data['access_code_response']);
            } else if (data['response'] == 3) {
              $("#responseNewAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", data['new_access_code_response']);
              $("#responseConfirmNewAccessCode").addClass("bg-danger").removeClass("bg-success").attr("title", data['new_access_code_response']);
            }
          },
          error: function(data) {
            alert("Ada kesalahan pada server.");
          }
        });
      }
    });
    $("#formChangeIndex").submit(function(e) {
      e.preventDefault();

      var data = $(this).serializeArray();
          icon = data.find(item =>  item.name === "fa_icon").value;
          description = data.find(item =>  item.name === "description").value;
          password = data.find(item =>  item.name === "password").value;

      if(icon == "" && description == "" && password == "") {
        alert("Input ikon, input deskripsi, dan input kata sandi tidak boleh kosong");
      } else {
        var data = $(this).serialize();
        
        $.ajax({
          url: "{{ url('/admin/update_deskripsi_halaman_index') }}",
          type: 'post',
          dataType: 'json',
          data: data,
          success: function(data) {
            if(data['success'] == 1) {
              alert("Berhasil mengubah deskripsi.");
              location.reload();
            } else {
              alert("Password salah.");
            }
          },
          error: function(data) {
            alert("Ada kesalahan pada server.");
          }
        });
      }
    });
    $("#formChangeBook").submit(function(e) {
      e.preventDefault();

      var data = $(this).serializeArray();
          icon = data.find(item =>  item.name === "fa_icon").value;
          description = data.find(item =>  item.name === "description").value;
          password = data.find(item =>  item.name === "password").value;

      if(icon == "" && description == "" && password == "") {
        alert("Input ikon, input deskripsi, dan input kata sandi tidak boleh kosong");
      } else {
        var data = $(this).serialize();
        
        $.ajax({
          url: "{{ url('/admin/update_deskripsi_halaman_daftar_buku') }}",
          type: 'post',
          dataType: 'json',
          data: data,
          success: function(data) {
            if(data['success'] == 1) {
              alert("Berhasil mengubah deskripsi.");
              location.reload();
            } else {
              alert("Password salah.");
            }
          },
          error: function(data) {
            alert("Ada kesalahan pada server.");
          }
        });
      }
    });
    $("#formChangeWriter").submit(function(e) {
      e.preventDefault();

      var data = $(this).serializeArray();
          icon = data.find(item =>  item.name === "fa_icon").value;
          description = data.find(item =>  item.name === "description").value;
          password = data.find(item =>  item.name === "password").value;

      if(icon == "" && description == "" && password == "") {
        alert("Input ikon, input deskripsi, dan input kata sandi tidak boleh kosong");
      } else {
        var data = $(this).serialize();
        
        $.ajax({
          url: "{{ url('/admin/update_deskripsi_halaman_daftar_penulis') }}",
          type: 'post',
          dataType: 'json',
          data: data,
          success: function(data) {
            if(data['success'] == 1) {
              alert("Berhasil mengubah deskripsi.");
              location.reload();
            } else {
              alert("Password salah.");
            }
          },
          error: function(data) {
            alert("Ada kesalahan pada server.");
          }
        });
      }
    });
    $("#formChangeFooter").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
      
      $.ajax({
        url: "{{ url('/admin/update_footer') }}",
        type: 'post',
        dataType: 'json',
        data: data,
        success: function(data) {
          if(data['success'] == 1) {
            alert("Berhasil mengubah informasi footer.");
            location.reload();
          } else {
            alert("Password salah.");
          }
        },
        error: function(data) {
          alert("Ada kesalahan pada server.");
        }
      });
    });
  });
</script>
@endsection