<div class="row">
  @forelse($kategori as $kategori)
    @forelse($kategori->subcategory as $subkategori)
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card bg-dark {{ (($subkategori->category->color_scheme == 'yellow') || ($subkategori->category->color_scheme == 'lime') ? 'dark-text' : 'white-text') }} mb-3 selectable" data-id="{{ $subkategori->id }}">
          <div class="card-header {{ $subkategori->category->color_scheme . ' darken-2' }}">
            <i class="fas fa-tags mr-3"></i>
            Subkategori : {{ ucwords(str_replace('_', ' ', $subkategori->category->category_name)) }}
          </div>
          <div class="card-body text-center {{ $subkategori->category->color_scheme . ' darken-1' }}">
            {{ ucwords(str_replace('_', ' ', $subkategori->subcategory_name)) }}
          </div>
        </div>
      </div>
    @empty
    @endforelse
  @empty
  @endforelse
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="card bg-dark white-text text-center mb-3 additive" style="padding: 0.75rem;" data-toggle="modal" data-target="#tambahSubkategori">
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
            Konfirmasi Pengubahan Subkategori
          </div>
          <div class="card-body">
            <p class="mb-3">
              Apakah Anda yakin ingin mengubah <span id="counterEdit"></span> subkategori yang Anda pilih?
              <b><i>Subkategori yang sudah diubah tidak bisa dikembalikan.</i></b>
            </p>
            <form id="formEditSubkategori">
              @csrf
              @method('PUT')
              <div class="input-group mb-2">
                <input type="password" name="password_reconfirm" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" />
                <div class="input-group-append">
                  <button class="btn btn-md btn-outline-white bg-white m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">
                    Ubah Subkategori
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
            Konfirmasi Penghapusan Subkategori
          </div>
          <div class="card-body">
            <p class="mb-3">
              Apakah Anda yakin ingin menghapus <span id="counterDelete"></span> Subkategori yang Anda pilih?
              <b><i>Subkategori yang sudah dihapus tidak bisa dikembalikan.</i></b>
            </p>
            <form id="formHapusSubkategori">
              @csrf
              @method('DELETE')
              <div class="input-group mb-2">
                <input type="password" name="password_reconfirm" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" />
                <div class="input-group-append">
                  <button class="btn btn-md btn-outline-white bg-white m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">
                    Hapus Subkategori
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
  <div class="modal fade" id="editSubkategori" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <form id="formEditDataSubkategori">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h4 class="modal-title w-100">Edit Subkategori</h4>
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
  <div class="modal fade" id="tambahSubkategori" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100">Tambah Subkategori</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formTambahSubkategori">
          @csrf
          <input type="hidden" name="max" value="1" />
          <div class="modal-body" id="additiveModal">
            <div id="data_1">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-tags"></i>
                  </span>
                </div>
                <input type="text" name="subcategory_1" class="form-control" placeholder="Nama Subkategori" autocomplete="off" />
                <div class="input-group-append" id="subcategoryResponse_1">
                  <span class="input-group-text">
                    <i class="fas fa-circle-notch"></i>
                  </span>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-tag"></i>
                  </span>
                </div>
                <select name="category_id_1" class="form-control">
                  <option value="" selected disabled hidden>--Pilih Kategori--</option>
                  @forelse($kategori_opsi_lain as $kategori)
                    <option class="{{ $kategori->color_scheme . '-text' }}" value="{{ $kategori->id }}">{{ ucwords(str_replace('_', ' ', $kategori->category_name)) }}</option>
                  @empty
                  @endforelse
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
      <button id="editor" class="btn elegant-color-dark white-text">
        <i class="fas fa-pen"></i>
      </button>
      <button id="deletor" class="btn elegant-color-dark white-text">
        <i class="fas fa-trash"></i>
      </button>
      <button id="selectAll" class="btn elegant-color-dark white-text">
        <i class="fas fa-check-square"></i>
      </button>
    </div>
  </div>
</div>
<script>
  function add() {
    passthru = 1;
    var options = $("select[name*='category_id_1']").html();
    var number = parseInt($("input[name='max']").val()) + 1;
    var build = " <div id='data_" + number +"'>\
                    <hr style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important' />\
                    <div class='input-group mb-3'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-tags'></i>\
                        </span>\
                      </div>\
                      <input type='text' name='subcategory_" + number + "' class='form-control' placeholder='Nama Subkategori' autocomplete='off' />\
                      <div class='input-group-append' id='subcategoryResponse_" + number + "'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-circle-notch'></i>\
                        </span>\
                      </div>\
                    </div>\
                    <div class='input-group mb-3'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-tag'></i>\
                        </span>\
                      </div>\
                      <select name='category_id_" + number + "' class='form-control'>" + options + "</select>\
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
    $("#formTambahSubkategori").submit(function(e) {
      e.preventDefault();
      max = parseInt($("input[name='max']").val());

      data = $(this).serializeArray();
      passthru = 1;

      for (i = 1; i <= max; i++) {
        subcategory = data.find(item =>  item.name === "subcategory_" + i).value;
        category_id = data.find(item =>  item.name === "category_id_" + i).value;

        // Jika Nama Lengkap kosong
        if (subcategory == undefined || subcategory == "" || subcategory.length < 4) {
          passthru = 0;
          $("#subcategoryResponse_" + i).children().removeClass('green').addClass('red white-text').attr('data-toggle', 'tooltip').attr('title', 'Nama Lengkap harus diisi setidaknya 4 karakter.');
          $("#subcategoryResponse_" + i).children().children().removeClass('fa-check fa-circle-notch').addClass('fa-times');
        } else {
          $("#subcategoryResponse_" + i).children().removeClass('red').addClass('green white-text').removeAttr('data-toggle').removeAttr('title');
          $("#subcategoryResponse_" + i).children().children().removeClass('fa-times fa-circle-notch').addClass('fa-check');
        }
      }

      // Jika semua data telah divalidasi
      if (passthru == 1) {
        var data = $(this).serialize();

        $.ajax({
          url: '/admin/subkategori',
          async: false,
          type: 'post',
          dataType: 'json',
          data: data,
          success: function(data) {
            if (data['success'] == 1) {
              $("#tambahSubkategori").modal('hide');
              setTimeout(function() {
                load_subkategori();
              }, 1000);
            } else {
              alert("Ada kesalahan server.");
            }
          }
        });
      }
    });
    /**
     * Delete Subkategori
     */
    $("#formHapusSubkategori").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
          data += "&" + serial;
      
      $.ajax({
        url: '/admin/delete_subkategori',
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
              load_subkategori();
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
     * Edit Subkategori
     */
    $("#formEditSubkategori").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
          data += "&" + serialEdit;

      $.ajax({
        url: '/admin/update_subkategori',
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
              load_subkategori();
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
    $("#formEditDataSubkategori").submit(function(e) {
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
      $("#editSubkategori").modal('show');

      var build = "";
      var data = serial;

      $.ajax({
        url: '/admin/edit_data_subkategori',
        type: 'get',
        dataType: 'json',
        data: data,
        success: function(data) {
          if (data['success'] == 1) {
            for(i = 1; i <= length; i++) {
              data_id = 'subcategory_' + i + '_id';
              data_name = 'subcategory_' + i + '_name';
              data_category_id = 'category_id_' + i;
              options = "\
                @forelse($kategori_opsi as $kategori)\
                  <option " + (data[data_category_id] == '{{ $kategori->id }}' ? 'selected' : '') + " class='{{ $kategori->color_scheme . '-text' }}' value='{{ $kategori->id }}'>{{ ucwords(str_replace('_', ' ', $kategori->category_name)) }}</option>\
                @empty\
                @endforelse\
              ";
              build += "  <div class='input-group mb-3'>\
                            <div class='input-group-prepend'>\
                              <div class='input-group-text'>\
                                <i class='fas fa-tags'></i>\
                              </div>\
                            </div>\
                            <input type='hidden' name='subcategory_id_" + i + "' value='" + data[data_id] + "' />\
                            <input type='text' name='subcategory_" + i + "' class='form-control' placeholder='Nama Subkategori' autocomplete='off' value='" + data[data_name] + "' />\
                          </div>\
                          <div class='input-group mb-3'>\
                            <div class='input-group-prepend'>\
                              <span class='input-group-text'>\
                                <i class='fas fa-tag'></i>\
                              </span>\
                            </div>\
                            <select name='category_id_" + i + "' class='selectpicker form-control'>" + options + "</select>\
                          </div>";
              if (i != length) {
                build += "<hr class='mt-0' style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important' />";
              }
            }
          }

          build += "<input type='hidden' name='max' value='" + length + "' />";
          
          $("#editData").html(build);
          $(".selectpicker").selectpicker('refresh');
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
        $("#selectables").html(length + " subkategori dipilih, untuk subkategori yang dipilih:");
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