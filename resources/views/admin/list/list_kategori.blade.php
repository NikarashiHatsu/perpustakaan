<div class="row">
  @forelse($kategori as $kategori)
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card bg-dark white-text mb-3 selectable" data-id="{{ $kategori->id }}">
        <div class="card-header">
          <i class="fas fa-tag mr-3"></i>
          Kategori
        </div>
        <div class="card-body text-center {{ $kategori->color_scheme . '-text' }}">
          {{ ucwords(str_replace('_', ' ', $kategori->category_name)) }}
        </div>
      </div>
    </div>
  @empty
  @endforelse
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="card bg-dark white-text text-center mb-3 additive waves-effect" style="padding: 0.75rem;" data-toggle="modal" data-target="#tambahKategori">
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
            Konfirmasi Pengubahan Kategori
          </div>
          <div class="card-body">
            <p class="mb-3">
              Apakah Anda yakin ingin mengubah <span id="counterEdit"></span> kategori yang Anda pilih?
              <b><i>Kategori yang sudah diubah tidak bisa dikembalikan. Subkategori yang terkait dengan kategori ini akan diubah juga.</i></b>
            </p>
            <form id="formEditKategori">
              @csrf
              @method('PUT')
              <div class="input-group mb-2">
                <input type="password" name="password_reconfirm" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" />
                <div class="input-group-append">
                  <button class="btn btn-md btn-outline-white bg-white m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">
                    Ubah Kategori
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
            Konfirmasi Penghapusan Kategori
          </div>
          <div class="card-body">
            <p class="mb-3">
              Apakah Anda yakin ingin menghapus <span id="counterDelete"></span> kategori yang Anda pilih?
              <b><i>Kategori yang sudah dihapus tidak bisa dikembalikan. Subkategori yang terkait dengan kategori ini akan dihapus juga.</i></b>
            </p>
            <form id="formHapusKategori">
              @csrf
              @method('DELETE')
              <div class="input-group mb-2">
                <input type="password" name="password_reconfirm" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" />
                <div class="input-group-append">
                  <button class="btn btn-md btn-outline-white bg-white m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">
                    Hapus Kategori
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
  <div class="modal fade" id="editKategori" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <form id="formEditDataKategori">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h4 class="modal-title w-100">Edit Kategori</h4>
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
  <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100">Tambah Kategori</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formTambahKategori">
          @csrf
          <input type="hidden" name="max" value="1" />
          <div class="modal-body" id="additiveModal">
            <div id="data_1">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-tag"></i>
                  </span>
                </div>
                <input type="text" name="category_1" class="form-control" placeholder="Nama Kategori" autocomplete="off" />
                <div class="input-group-append" id="categoryResponse_1">
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
                <select name="color_scheme_1" class="form-control">
                  <option value="" selected disabled hidden>-- Pilih Skema Warna--</option>
                  <option value="red" class="red-text">Merah</option>
                  <option value="pink" class="pink-text">Merah Muda</option>
                  <option value="purple" class="purple-text">Ungu</option>
                  <option value="deep-purple" class="deep-purple-text">Ungu Gelap</option>
                  <option value="indigo" class="indigo-text">Nila</option>
                  <option value="blue" class="blue-text">Blue</option>
                  <option value="light -blue" class="light-blue-text">Biru Terang</option>
                  <option value="cyan" class="cyan-text">Biru Hijau</option>
                  <option value="teal" class="teal-text">Biru Hijau Gelap</option>
                  <option value="green" class="green-text">Hijau</option>
                  <option value="light-green" class="light-green-text">Hijau Terang</option>
                  <option value="lime" class="lime-text">Hijau Jeruk Nipis</option>
                  <option value="yellow" class="yellow-text">Kuning</option>
                  <option value="amber" class="amber-text">Kuning Tua</option>
                  <option value="orange" class="orange-text">Oranye</option>
                  <option value="deep-orange" class="deep-orange-text">Oranye Gelap</option>
                  <option value="brown" class="brown-text">Cokelat</option>
                  <option value="grey" class="grey-text">Abu-abu</option>
                  <option value="blue-grey" class="blue-grey-text">Abu-abu Biru</option>
                </select>
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
  function add() {
    passthru = 1;
    var number = parseInt($("input[name='max']").val()) + 1;
    var build = " <div id='data_" + number +"'>\
                    <hr style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important' />\
                    <div class='input-group mb-3'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-tag'></i>\
                        </span>\
                      </div>\
                      <input type='text' name='category_" + number + "' class='form-control' placeholder='Nama Kategori' autocomplete='off' />\
                      <div class='input-group-append' id='categoryResponse_" + number + "'>\
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
                      <select name='color_scheme_" + number + "' class='form-control'>\
                        <option value='' selected disabled hidden>--Pilih Skema Warna--</option>\
                        <option value='red' class='red-text'>Merah</option>\
                        <option value='pink' class='pink-text'>Merah Muda</option>\
                        <option value='purple' class='purple-text'>Ungu</option>\
                        <option value='deep-purple' class='deep-purple-text'>Ungu Gelap</option>\
                        <option value='indigo' class='indigo-text'>Nila</option>\
                        <option value='blue' class='blue-text'>Blue</option>\
                        <option value='light -blue' class='light-blue-text'>Biru Terang</option>\
                        <option value='cyan' class='cyan-text'>Biru Hijau</option>\
                        <option value='teal' class='teal-text'>Biru Hijau Gelap</option>\
                        <option value='green' class='green-text'>Hijau</option>\
                        <option value='light-green' class='light-green-text'>Hijau Terang</option>\
                        <option value='lime' class='lime-text'>Hijau Jeruk Nipis</option>\
                        <option value='yellow' class='yellow-text'>Kuning</option>\
                        <option value='amber' class='amber-text'>Kuning Tua</option>\
                        <option value='orange' class='orange-text'>Oranye</option>\
                        <option value='deep-orange' class='deep-orange-text'>Oranye Gelap</option>\
                        <option value='brown' class='brown-text'>Cokelat</option>\
                        <option value='grey' class='grey-text'>Abu-abu</option>\
                        <option value='blue-grey' class='blue-grey-text'>Abu-abu Biru</option>\
                      </select>\
                    </div>";
    $("#additiveModal").append(build);
    $("input[name='max']").val(number);
    $("#removeButton").removeClass('d-none');
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
    var serial, serialEdit, length;

    /**
     * Submit data
     */
    $("#formTambahKategori").submit(function(e) {
      e.preventDefault();
      max = parseInt($("input[name='max']").val());

      data = $(this).serializeArray();
      passthru = 1;

      for (i = 1; i <= max; i++) {
        category = data.find(item =>  item.name === "category_" + i).value;
        color_scheme = data.find(item =>  item.name === "color_scheme_" + i).value;

        // Jika Nama Lengkap kosong
        if (category == undefined || category == "" || category.length < 4) {
          passthru = 0;
          $("#categoryResponse_" + i).children().removeClass('green').addClass('red white-text').attr('data-toggle', 'tooltip').attr('title', 'Nama Lengkap harus diisi setidaknya 4 karakter.');
          $("#categoryResponse_" + i).children().children().removeClass('fa-check fa-circle-notch').addClass('fa-times');
        } else {
          $("#categoryResponse_" + i).children().removeClass('red').addClass('green white-text').removeAttr('data-toggle').removeAttr('title');
          $("#categoryResponse_" + i).children().children().removeClass('fa-times fa-circle-notch').addClass('fa-check');
        }
      }

      // Jika semua data telah divalidasi
      if (passthru == 1) {
        var data = $(this).serialize();

        $.ajax({
          url: "{{ url('/admin/kategori') }}",
          async: false,
          type: 'post',
          dataType: 'json',
          data: data,
          success: function(data) {
            if (data['success'] == 1) {
              $("#tambahKategori").modal('hide');
              setTimeout(function() {
                load_kategori();
              }, 1000);
            } else {
              alert("Ada kesalahan server.");
            }
          },
          error: function(data) {
            alert("Ada kesalahan pada server.");
          }
        });
      }
    });
    /**
     * Delete Kategori
     */
    $("#formHapusKategori").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
          data += "&" + serial;
      
      $.ajax({
        url: "{{ url('/admin/delete_kategori') }}",
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
              load_kategori();
            }, 1000);
          } else {
            if (data['password_failure == 1']) {
              alert("Ada kesalahan server.");
            }
          }
        },
        error: function(data) {
          alert("Ada kesalahan pada server.");
        }
      });
    });
    /**
     * Edit Kategori
     */
    $("#formEditKategori").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
          data += "&" + serialEdit;

      $.ajax({
        url: "{{ url('/admin/update_kategori') }}",
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
              load_kategori();
            }, 1000);
          } else {
            if (data['password_failure == 1']) {
              alert("Ada kesalahan server.");
            }
          }
        },
        error: function(data) {
          alert("Ada kesalahan pada server.");
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
    $("#formEditDataKategori").submit(function(e) {
      e.preventDefault();

      serialEdit = $(this).serialize();
      $(".modal").modal('hide');
      $("#counterEdit").html(length);
      $("#reassureEdit").modal('show');
    });



    /**
     * Munculkan edit page
     */
    $("#editor").on('click', function() {
      $("#editKategori").modal('show');

      var build = "";
      var data = serial;

      $.ajax({
        url: "{{ url('/admin/edit_data_kategori') }}",
        type: 'get',
        dataType: 'json',
        data: data,
        success: function(data) {
          if (data['success'] == 1) {
            for(i = 1; i <= length; i++) {
              data_id = 'category_' + i + '_id';
              data_name = 'category_' + i + '_name';
              data_color_scheme = 'category_' + i + '_color_scheme';
              build += "  <div class='input-group mb-3'>\
                            <div class='input-group-prepend'>\
                              <div class='input-group-text'>\
                                <i class='fas fa-tag'></i>\
                              </div>\
                            </div>\
                            <input type='hidden' name='category_id_" + i + "' value='" + data[data_id] + "' />\
                            <input type='text' name='category_" + i + "' class='form-control' placeholder='Nama Kategori' autocomplete='off' value='" + data[data_name] + "' />\
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
                            <select name='color_scheme_" + i + "' class='form-control'>\
                              <option value='' selected disabled hidden>--Pilih Skema Warna--</option>\
                              <option" + (data[data_color_scheme] == 'red' ? ' selected ' : '') + " value='red' class='red-text'>Merah</option>\
                              <option" + (data[data_color_scheme] == 'pink' ? ' selected ' : '') + " value='pink' class='pink-text'>Merah Muda</option>\
                              <option" + (data[data_color_scheme] == 'purple' ? ' selected ' : '') + " value='purple' class='purple-text'>Ungu</option>\
                              <option" + (data[data_color_scheme] == 'deep-purple' ? ' selected ' : '') + " value='deep-purple' class='deep-purple-text'>Ungu Gelap</option>\
                              <option" + (data[data_color_scheme] == 'indigo' ? ' selected ' : '') + " value='indigo' class='indigo-text'>Nila</option>\
                              <option" + (data[data_color_scheme] == 'blue' ? ' selected ' : '') + " value='blue' class='blue-text'>Blue</option>\
                              <option" + (data[data_color_scheme] == 'light-blue' ? ' selected ' : '') + " value='light -blue' class='light-blue-text'>Biru Terang</option>\
                              <option" + (data[data_color_scheme] == 'cyan' ? ' selected ' : '') + " value='cyan' class='cyan-text'>Biru Hijau</option>\
                              <option" + (data[data_color_scheme] == 'teal' ? ' selected ' : '') + " value='teal' class='teal-text'>Biru Hijau Gelap</option>\
                              <option" + (data[data_color_scheme] == 'green' ? ' selected ' : '') + " value='green' class='green-text'>Hijau</option>\
                              <option" + (data[data_color_scheme] == 'light-green' ? ' selected ' : '') + " value='light-green' class='light-green-text'>Hijau Terang</option>\
                              <option" + (data[data_color_scheme] == 'lime' ? ' selected ' : '') + " value='lime' class='lime-text'>Hijau Jeruk Nipis</option>\
                              <option" + (data[data_color_scheme] == 'yellow' ? ' selected ' : '') + " value='yellow' class='yellow-text'>Kuning</option>\
                              <option" + (data[data_color_scheme] == 'amber' ? ' selected ' : '') + " value='amber' class='amber-text'>Kuning Tua</option>\
                              <option" + (data[data_color_scheme] == 'orange' ? ' selected ' : '') + " value='orange' class='orange-text'>Oranye</option>\
                              <option" + (data[data_color_scheme] == 'deep-orange' ? ' selected ' : '') + " value='deep-orange' class='deep-orange-text'>Oranye Gelap</option>\
                              <option" + (data[data_color_scheme] == 'brown' ? ' selected ' : '') + " value='brown' class='brown-text'>Cokelat</option>\
                              <option" + (data[data_color_scheme] == 'grey' ? ' selected ' : '') + " value='grey' class='grey-text'>Abu-abu</option>\
                              <option" + (data[data_color_scheme] == 'blue-grey' ? ' selected ' : '') + " value='blue-grey' class='blue-grey-text'>Abu-abu Biru</option>\
                            </select>\
                          </div>";

              if (i != length) {
                build += "<hr class='mt-0' style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important' />";
              }
            }
          }

          build += "<input type='hidden' name='max' value='" + length + "' />";
          
          $("#editData").html(build);
        },
        error: function(data) {
          alert("Ada kesalahan pada server.");
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
        $("#selectables").html(length + " kategori dipilih, untuk kategori yang dipilih:");
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