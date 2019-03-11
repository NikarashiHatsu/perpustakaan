<div class="row">
  @forelse($siswa as $siswa)
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-dark white-text mb-3 selectable" data-id="{{ $siswa->id }}">
        <div class="card-body">
          <table>
            <tbody>
              <tr>
                <td>
                  <i class="fas fa-user fa-2x"></i>
                </td>
                <td class="w-100">
                  <h4 class="m-0 card-title text-center align-middle">{{ $siswa->name }}</h4>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="mt-3 pt-3 border-top">
            <table class="w-100">
              <tbody>
                <tr>
                  <td>NIS (Kode Akses)</td>
                  <td>:</td>
                  <td>{{ $siswa->access_code }}</td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td>:</td>
                  <td>{{ $siswa->reveal }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @empty
  @endforelse
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="card bg-dark white-text text-center mb-3 additive waves-effect" style="padding: 1.95rem;" data-toggle="modal" data-target="#tambahSiswa">
      <div class="card-body">
        <i class="fas fa-plus fa-3x"></i>
      </div>
    </div>
  </div>
  <div class="modal fade" id="reassureEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content" style="border-radius: 5px; -webkit-border-radius: 5px;">
        <div class="card bg-danger white-text">
          <div class="card-header">
            <i class="fas fa-exclamation-triangle mr-3"></i>
            Konfirmasi Pengubahan Siswa
          </div>
          <div class="card-body">
            <p class="mb-3">
              Apakah Anda yakin ingin mengubah <span id="counterEdit"></span> akun siswa yang Anda pilih?
              <b><i>Akun yang sudah diubah tidak bisa dikembalikan.</i></b>
            </p>
            <form id="formEditSiswa">
              @csrf
              @method('PUT')
              <div class="input-group mb-2">
                <input type="password" name="password_reconfirm" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" />
                <div class="input-group-append">
                  <button class="btn btn-md btn-outline-white bg-white m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">
                    Ubah Akun Siswa
                  </button>
                </div>
              </div>
              <span id="passwordReconfirmResponse"></span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="reassureDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content" style="border-radius: 5px; -webkit-border-radius: 5px;">
        <div class="card bg-danger white-text">
          <div class="card-header">
            <i class="fas fa-exclamation-triangle mr-3"></i>
            Konfirmasi Penghapusan Siswa
          </div>
          <div class="card-body">
            <p class="mb-3">
              Apakah Anda yakin ingin menghapus <span id="counterDelete"></span> akun siswa yang Anda pilih?
              <b><i>Akun yang sudah dihapus tidak bisa dikembalikan.</i></b>
            </p>
            <form id="formHapusSiswa">
              @csrf
              @method('DELETE')
              <div class="input-group mb-2">
                <input type="password" name="password_reconfirm" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" />
                <div class="input-group-append">
                  <button class="btn btn-md btn-outline-white bg-white m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">
                    Hapus Akun Siswa
                  </button>
                </div>
              </div>
              <span id="passwordReconfirmResponse"></span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editSiswa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <form id="formEditDataSiswa">
          @csrf
          @method('PUT')
          <input type="hidden" name="edit_kelas" value="" />
          <input type="hidden" name="edit_jurusan" value="" />
          <input type="hidden" name="edit_rombel" value="" />
          <div class="modal-header">
            <h4 class="modal-title w-100">Edit Siswa (<span id="titleEditSiswa"></span>)</h4>
            <button type="button" data-dismiss="modal" class="close">
              <span>
                <i class="fas fa-times"></i>
              </span>
            </button>
          </div>
          <div class="modal-body" id="editData">

          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger btn-sm">
              <i class="fas fa-undo mr-3"></i>
              Reset
            </button>
            <button type="submit" class="btn btn-green btn-sm">
              <i class="fas fa-save mr-3"></i>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100">Tambah Siswa (<span id="titleTambahSiswa"></span>)</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formTambahSiswa">
          @csrf
          <input type="hidden" name="max" value="1" />
          <input type="hidden" name="tambah_kelas" value="" />
          <input type="hidden" name="tambah_jurusan" value="" />
          <input type="hidden" name="tambah_rombel" value="" />
          <div class="modal-body" id="additiveModal">
            <div id="data_1">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-user"></i>
                  </span>
                </div>
                <input type="text" name="full_name_1" class="form-control" placeholder="Nama Lengkap" autocomplete="off" />
                <div class="input-group-append" id="fullNameResponse_1">
                  <span class="input-group-text">
                    <i class="fas fa-circle-notch"></i>
                  </span>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </span>
                </div>
                <input type="text" name="access_code_1" class="form-control" placeholder="NIS (Kode Akses)" autocomplete="off" />
                <div class="input-group-append" id="accessCodeResponse_1">
                  <span class="input-group-text">
                    <i class="fas fa-circle-notch"></i>
                  </span>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </span>
                </div>
                <input type="text" name="password_1" class="form-control" placeholder="Kata Sandi" autocomplete="off" readonly />
                <div class="input-group-append" data-toggle="tooltip" title="Kata Sandi secara otomatis dibuat, pengguna bisa menggantinya nanti setelah masuk.">
                  <span class="input-group-text">
                    <i class="fas fa-info"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="ml-auto">
              <button type='button' class="btn btn-danger btn-sm ml-auto m-0 d-none" id="removeButton" onclick="remove()">
                <i class="fas fa-minus mr-3"></i>Hapus Baris
              </button>
              <button type='button' class="btn btn-green btn-sm ml-auto m-0" onclick="add()">
                <i class="fas fa-plus mr-3"></i>Tambah Baris
              </button>
            </div>
            <button type="submit" class="btn btn-green btn-sm">
              <i class="fas fa-save mr-3"></i>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<hr class="mt-0" />
<div class="row">
  <div class="col-sm-12 text-white">
    <div id="selectables" class="mb-3"></div>
    <div id="option" style="display: none;">
      <button id="exchanger" class="btn elegant-color-dark white-text waves-effect">
        <i class="fas fa-exchange-alt"></i>
      </button>
      <button id="editor" class="btn elegant-color-dark white-text waves-effect">
        <i class="fas fa-pen"></i>
      </button>
      <button id="deletor" class="btn elegant-color-dark white-text waves-effect">
        <i class="fas fa-trash"></i>
      </button>
      <button id="selectAll" class="btn elegant-color-dark white-text waves-effect">
        <i class="fas fa-check-square"></i>
      </button>
    </div>
  </div>
</div>
<script>
  function search() {
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
      }
    });
  }
  function add() {
    passthru = 1;
    var number = parseInt($("input[name='max']").val()) + 1;
    var build = " <div id='data_" + number +"'>\
                    <hr />\
                    <div class='input-group mb-3'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-user'></i>\
                        </span>\
                      </div>\
                      <input type='text' name='full_name_" + number + "' class='form-control' placeholder='Nama Lengkap' autocomplete='off' />\
                      <div class='input-group-append' id='fullNameResponse_" + number + "'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-circle-notch'></i>\
                        </span>\
                      </div>\
                    </div>\
                    <div class='input-group mb-3'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-id-card'></i>\
                        </span>\
                      </div>\
                      <input type='text' name='access_code_" + number + "' class='form-control' placeholder='NIS (Kode Akses)' autocomplete='off' />\
                      <div class='input-group-append' id='accessCodeResponse_" + number + "'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-circle-notch'></i>\
                        </span>\
                      </div>\
                    </div>\
                    <div class='input-group mb-3'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-lock'></i>\
                        </span>\
                      </div>\
                      <input type='text' name='password_" + number + "' class='form-control' placeholder='Kata Sandi' autocomplete='off' readonly />\
                      <div class='input-group-append' data-toggle='tooltip' title='Kata Sandi secara otomatis dibuat, pengguna bisa menggantinya nanti setelah masuk.'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-info'></i>\
                        </span>\
                      </div>\
                    </div>";
    $("#additiveModal").append(build);
    $("input[name='max']").val(number);
    $("#removeButton").removeClass('d-none');
    generatePassword(number);
  }
  function remove() {
    var number = parseInt($("input[name='max']").val());
    
    if ((number - 1) == 1) {
      $("#removeButton").addClass('d-none');
    }
    
    $("#data_" + number).remove();
    $("input[name='max']").val(number - 1);
  }
  $().ready(function() {
    var count = "{{ $count }}";
        classInfo = "{{ $class_info }}";
        kelas = $("select[name*='kelas']").val();
        jurusan = $("select[name*='jurusan']").val();
        rombel = $("select[name*='rombel']").val();
        $("input[name*='tambah_kelas']").val(kelas);
        $("input[name*='tambah_jurusan']").val(jurusan);
        $("input[name*='tambah_rombel']").val(rombel);
        $("input[name*='edit_kelas']").val(kelas);
        $("input[name*='edit_jurusan']").val(jurusan);
        $("input[name*='edit_rombel']").val(rombel);
    var serial, serialEdit, length;

    $("#titleTambahSiswa").html(classInfo);
    $("#titleEditSiswa").html(classInfo);
    /**
     * Random string generator
     */
    $("#tambahSiswa").on('shown.bs.modal', function() {
      for (i = 1; i <= parseInt($("input[name='max']").val()); i++) {
        generatePassword(i);
      }
    });

    /**
     * Submit data
     */
    $("#formTambahSiswa").submit(function(e) {
      e.preventDefault();
      max = parseInt($("input[name='max']").val());

      data = $(this).serializeArray();
      passthru = 1;

      for (i = 1; i <= max; i++) {
        fullname = data.find(item =>  item.name === "full_name_" + i).value;
        access_code = data.find(item =>  item.name === "access_code_" + i).value;

        // Jika Nama Lengkap kosong
        if (fullname == undefined || fullname == "" || fullname.length < 4) {
          passthru = 0;
          $("#fullNameResponse_" + i).children().removeClass('green').addClass('red white-text').attr('data-toggle', 'tooltip').attr('title', 'Nama Lengkap harus diisi setidaknya 4 karakter.');
          $("#fullNameResponse_" + i).children().children().removeClass('fa-check fa-circle-notch').addClass('fa-times');
        } else {
          $("#fullNameResponse_" + i).children().removeClass('red').addClass('green white-text').removeAttr('data-toggle').removeAttr('title');
          $("#fullNameResponse_" + i).children().children().removeClass('fa-times fa-circle-notch').addClass('fa-check');
        }

        // Jika Kode Akses kosong
        if (access_code == undefined || access_code == "" || access_code.length < 4) {
          passthru = 0;
          $("#accessCodeResponse_" + i).children().removeClass('green').addClass('red white-text').attr('data-toggle', 'tooltip').attr('title', 'NIS (Kode Akses) harus diisi setidaknya 4 karakter.');
          $("#accessCodeResponse_" + i).children().children().removeClass('fa-check fa-circle-notch').addClass('fa-times');
        } else {
          row = i;
          var ajaxData = {
            'access_code': access_code,
          }
          $.ajax({
            url: '/admin/checker/access_code',
            async: false,
            type: 'get',
            dataType: 'json',
            data: ajaxData,
            success: function(data) {
              if (data['success'] == 1) {
                // console.log("#accessCodeResponse_" + row);
                $("#accessCodeResponse_" + row).children().removeClass('red').addClass('green white-text').removeAttr('data-toggle').removeAttr('title');
                $("#accessCodeResponse_" + row).children().children().removeClass('fa-times fa-circle-notch').addClass('fa-check');
              } else {
                // console.log("#accessCodeResponse_" + row);
                passthru = 0;
                $("#accessCodeResponse_" + row).children().removeClass('green').addClass('red white-text').attr('data-toggle', 'tooltip').attr('title', 'NIS (Kode Akses) sudah terpakai.');
                $("#accessCodeResponse_" + row).children().children().removeClass('fa-check fa-circle-notch').addClass('fa-times');
              }
            }
          });
          passthru = passthru;
        }
      }

      // Jika semua data telah divalidasi
      if (passthru == 1) {
        var data = $(this).serialize();

        $.ajax({
          url: '/admin/siswa',
          async: false,
          type: 'post',
          dataType: 'json',
          data: data,
          success: function(data) {
            if (data['success'] == 1) {
              $("#tambahSiswa").modal('hide');
              setTimeout(function() {
                search();
              }, 1000);
            } else {
              alert("Ada kesalahan server.");
            }
          }
        });
      }
    });
    /**
     * Delete Siswa
     */
    $("#formHapusSiswa").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
          data += "&" + serial;
      
      $.ajax({
        url: '/admin/delete_siswa',
        data: data,
        dataType: 'json',
        type: 'post',
        success: function(data) {
          if (data['password_failure'] == 1) {
            $("#passwordReconfirmResponse").html("Kata Sandi Salah");
          } else {
            $("#passwordReconfirmResponse").html("");
          }

          if (data['success'] == 1) {
            $("#reassureDelete").modal('hide');
            setTimeout(function() {
              search();
            }, 1000);
          } else {
            if (data['password_failure == 1']) {
              alert("Ada kesalahan server.");
            }
          }
        }
      });
    });
    /**
     * Edit Siswa
     */
    $("#formEditSiswa").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
          data += "&" + serialEdit;

      $.ajax({
        url: '/admin/update_siswa',
        data: data,
        dataType: 'json',
        type: 'post',
        success: function(data) {
          if (data['password_failure'] == 1) {
            $("#passwordReconfirmResponse").html("Kata Sandi Salah");
          } else {
            $("#passwordReconfirmResponse").html("");
          }

          if (data['success'] == 1) {
            $("#reassureEdit").modal('hide');
            setTimeout(function() {
              search();
            }, 1000);
          } else {
            if (data['password_failure == 1']) {
              alert("Ada kesalahan server.");
            }
          }
        }
      });
    });
    

    
    /**
     * Pilih Kartu
     */
    $(".card.selectable").on('click',function() {
      if($(this).hasClass('selected')) {
        $(this).removeClass('selected');
        logger();
      } else {
        $(this).addClass('selected');
        logger();
      }
    });
    /**
     * Pilih semua kartu
     */
    $("#selectAll").on('click', function() {
      var dataSelected = $(".selected").length;
          dataPresent = $(".selectable").length;

      if (dataSelected < dataPresent) {
        $(".selectable").each(function() {
          $(this).addClass('selected');
          logger();
        });
      } else {
        $(".selectable").each(function() {
          $(this).removeClass('selected');
          logger();
        });
      }
    });



    /**
     * Hapus kartu yang dipilih
     */
    $("#deletor").on('click', function() {
      $("#reassureDelete").modal("show");
      $("#counterDelete").html(length);
    });
    /**
     * Edit kartu yang dipilih
     */
    $("#formEditDataSiswa").submit(function(e) {
      e.preventDefault();

      serialEdit = $(this).serialize();
      $(".modal").modal('hide');
      $("#counterEdit").html(length);
      $("#reassureEdit").modal('show');
    });



    /**
     * Munculkan Alert
     */
    $("#alert").html("<div class='card bg-dark white-text'>\
                        <div class='card-header'>\
                          <i class='fas fa-exclamation-triangle mr-3'></i>\
                          Informasi\
                        </div>\
                        <div class='card-body'>\
                          Berhasil memuat data dari kelas <b>" + classInfo + "</b>. Memuat <b>" + count + "</b> siswa.\
                        </div>\
                      </div>");



    /**
     * Munculkan edit page
     */
    $("#editor").on('click', function() {
      $("#editSiswa").modal('show');

      var build = "";
      var data = serial;
      var title = $("select[name*='kelas']").val() + " " + $("select[name*='jurusan']").val() + " " + $("select[name*='rombel']").val();

      $.ajax({
        url: '/admin/edit_data_user',
        type: 'get',
        dataType: 'json',
        data: data,
        success: function(data) {
          if (data['success'] == 1) {
            for(i = 1; i <= length; i++) {
              data_name = 'user_' + i + '_name';
              data_access_code = 'user_' + i + '_access_code';
              data_id = 'user_' + i + '_id';
              build += "  <div class='input-group mb-3'>\
                            <div class='input-group-prepend'>\
                              <div class='input-group-text'>\
                                <i class='fas fa-user'></i>\
                              </div>\
                            </div>\
                            <input type='hidden' name='user_id_" + i + "' value='" + data[data_id] + "' />\
                            <input type='text' name='full_name_" + i + "' class='form-control' placeholder='Nama Lengkap' autocomplete='off' value='" + data[data_name] + "' />\
                          </div>";
                          
              if (i != length) {
                build += "<div class='input-group mb-3'>";
              } else {
                build += "<div class='input-group'>";
              }
              
              build += "    <div class='input-group-prepend'>\
                              <div class='input-group-text'>\
                                <i class='fas fa-id-card'></i>\
                              </div>\
                            </div>\
                            <input type='text' name='access_code_" + i + "' class='form-control' placeholder='NIS (Kode Akses)' autocomplete='off' value='" + data[data_access_code] + "' />\
                          </div>";

              if (i != length) {
                build += "<hr class='mt-0' style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important' />";
              }
            }
          }

          build += "<input type='hidden' name='max' value='" + length + "' />";
          
          $("#editData").html(build);
        }
      });
    });
    
    /**
     * Umpan balik pilih kartu
     */
    function logger() {
      length = $(".selected").length;
      serial = "";
      i = 1; 
          
      $(".selected").each(function() {
        serial += "data_" + i + "=" + $(this).attr('data-id') + "&";
        i++;
      });

      serial += 'max=' + length;

      if (length == 0) {
        $("#selectables").html("");
        $("#option").css({
          'display': 'none',
        });
      } else {
        $("#selectables").html(length + " akun dipilih, untuk akun yang dipilih:");
        $("#option").css({
          'display': 'block',
        });
      }
    }
  });
  
  function generatePassword(n) {
    let r = Math.random().toString(36).substr(2, 8);
    $("input[name='password_" + n + "']").val(r);
  }
</script>