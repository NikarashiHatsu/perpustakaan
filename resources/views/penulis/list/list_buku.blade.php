<div class="row">
  @forelse($buku as $buku)
    <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="card bg-dark white-text mb-3 selectable" data-id="{{ $buku->id }}">
        <div class="card-image-thumbnail" style="background-image: url('{{ asset('/img/book_page/' . $buku->book_name . '_page_1.jpg') }}');"></div>
        <small>
          <div class="card-body">
            <h5>{{ mb_strimwidth($buku->book_title, 0, 20, '...') }}</h5>
            <hr />
            <p class="mb-1">
              <i class="fas fa-user mr-3"></i>
              {{ $buku->user->name }}
            </p>
            <p class="mb-1">
              <i class="fas fa-globe mr-3"></i>
              {{ $buku->publisher }}
            </p>
            <p class="mb-1">
              <i class="fas fa-copy mr-3"></i>
              {{ $buku->page_count }} Halaman
            </p>
            <p class="mb-1">
              <i class="fas fa-tags mr-3"></i>
              @php($subcategory_ids = explode(',', $buku->subcategory_ids))
              @forelse($subcategory_ids as $subcategory_id)
                @php($subcategory = App\Subcategory::find($subcategory_id))
                <span class="badge badge-pills {{ $subcategory->category->color_scheme }} darken-1">{{ ucwords(str_replace('_', ' ', $subcategory->subcategory_name)) }}</span>     
              @empty
              @endforelse
            </p>
          </div>
          <div class="card-footer">
            <i class="fas fa-clock mr-3"></i>
            {{ $buku->created_at }}
          </div>
        </small>
      </div>
    </div>
  @empty
  @endforelse
  <div class="col-sm-12 col-md-6 col-lg-3">
    <div class="card bg-dark white-text text-center mb-3 additive" style="padding: 11.35rem 0;" data-toggle="modal" data-target="#tambahBuku">
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
            Konfirmasi Pengubahan Buku
          </div>
          <div class="card-body">
            <p class="mb-3">
              Apakah Anda yakin ingin mengubah <span id="counterEdit"></span> buku yang Anda pilih?
              <b><i>Buku yang sudah diubah tidak bisa dikembalikan.</i></b>
            </p>
            <form id="formEditBuku">
              @csrf
              @method('PUT')
              <div class="input-group mb-2">
                <input type="password" name="password_reconfirm" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" />
                <div class="input-group-append">
                  <button class="btn btn-md btn-outline-white bg-white m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">
                    Ubah Buku
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
            Konfirmasi Penghapusan Buku
          </div>
          <div class="card-body">
            <p class="mb-3">
              Apakah Anda yakin ingin menghapus <span id="counterDelete"></span> buku yang Anda pilih?
              <b><i>Buku yang sudah dihapus tidak bisa dikembalikan</i></b>
            </p>
            <form id="formHapusBuku">
              @csrf
              @method('DELETE')
              <div class="input-group mb-2">
                <input type="password" name="password_reconfirm" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" />
                <div class="input-group-append">
                  <button class="btn btn-md btn-outline-white bg-white m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">
                    Hapus Buku
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
  <div class="modal fade" id="editBuku" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form id="formEditDataBuku">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h4 class="modal-title w-100">Edit Buku</h4>
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
  <div class="modal fade" id="tambahBuku" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100">Tambah Buku</h4>
          <button type="button" data-dismiss="modal" class="close">
            <span>
              <i class="fas fa-times"></i>
            </span>
          </button>
        </div>
        <form id="formTambahBuku">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="row mb-3 mb-md-0 mx-1 p-5 text-center" style="border: 5px dashed #AAA; color: #AAA">
                  <div class="col-12" id="thumbnail">
                    <i class="fas fa-book fa-3x mb-3"></i>
                    <h4>Pratinjau tidak tersedia</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-8 col-sm-12">
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" name="upload" id="customFile" class="custom-file-input" />
                    <label for="customFile" class="custom-file-label" id="customFileLabel">Pilih buku</label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-book"></i>
                    </span>
                  </div>
                  <input type="text" name="book_title" class="form-control" placeholder="Nama Buku">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-globe"></i>
                    </span>
                  </div>
                  <input type="text" name="publisher" class="form-control" placeholder="Nama Penerbit" />
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-tags"></i>
                    </span>
                  </div>
                  <select name='categories[]' class="selectpicker form-control" data-live-search="true" multiple>
                    @forelse($kategori as $kategori)
                      <optgroup label="{{ ucwords(str_replace('_', ' ', $kategori->category_name)) }}">
                        @forelse ($kategori->subcategory as $subkategori)
                          <option value="{{ $subkategori->id }}">{{ ucwords(str_replace('_', ' ', $subkategori->subcategory_name)) }}</option>                        
                        @empty
                        @endforelse
                      </optgroup>
                    @empty
                    @endforelse
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
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
  $().ready(function() {
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';
    var passthru = 0;
    var serial, serialEdit, length;
    
    $(".selectpicker").selectpicker();
    $("#customFile").on('change', function() {
      var string = $(this).prop('files')[0];
          type = string['type'];
          size = string['size'];

      if (type == 'application/pdf') {
        if (size < 2048000) {
          $("#customFileLabel").html(string['name']);

          var fd = new FormData($("#formTambahBuku")[0]);
          
          $.ajax({
            url: '/penulis/thumbnail_creator',
            type: 'post',
            dataType: 'json',
            data: fd,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function(data) {
              $("input[name*='book_title']").val(data['nama_asli']);
              $("#thumbnail").html("<img class='my-3 z-depth-1-half' style='width: 100%;' src='{{ asset('temp_img') }}" + "/" + data['thumbnail'] + "' />");
              $("#thumbnail").parent().removeClass("p-5");

              setTimeout(function() {
                var req = {
                  'pdf': data['pdf'],
                  'img': data['thumbnail'],
                }
                $.ajax({
                  url: '/penulis/deletor',
                  type: 'get',
                  data: req,
                });
              }, 3000);
              passthru = 1;
            },            
            error: function(data) {
              alert("Ada kesalahan pada server.");
              passthru = 0;
            }
          });

          passthru = passthru;
        } else {
          $("#customFileLabel").html("<span class='red-text'>File tidak boleh melebihi 2mb</span>")
          passthru = 0;
        }        
      } else {
        $("#customFileLabel").html("<span class='red-text'>File bukan PDF</span>")
        passthru = 0;
      }
    });

    /**
     * Submit data
     */
    $("#formTambahBuku").submit(function(e) {
      e.preventDefault();
      passthru = 1;

      // Jika semua data telah divalidasi
      var data = new FormData(this);

      if (passthru == 1) {
        $.ajax({
          url: '/penulis/buku',
          type: 'post',
          dataType: 'json',
          data: data,
          enctype: 'multipart/form-data',
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data['success'] == 1) {
              $("#tambahBuku").modal('hide');
              setTimeout(function() {
                load_buku();
              }, 1000);
            } else {
              alert("Ada kesalahan server.");
            }
          }
        });
      }
    });
    /**
     * Delete Buku
     */
    $("#formHapusBuku").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
          data += "&" + serial;
      
      $.ajax({
        url: '/penulis/delete_buku',
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
              load_buku();
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
     * Edit Buku
     */
    $("#formEditBuku").submit(function(e) {
      e.preventDefault();

      var data = $(this).serialize();
          data += "&" + serialEdit;

      $.ajax({
        url: '/penulis/update_buku',
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
              load_buku();
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
      var dataSelected = $(".card.selected").length;
          dataPresent = $(".card.selectable").length;

      if (dataSelected < dataPresent) {
        $(".card.selectable").each(function() {
          $(this).addClass('selected');
          logger();
        });
      } else {
        $(".card.selectable").each(function() {
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
    $("#formEditDataBuku").submit(function(e) {
      e.preventDefault();

      serialEdit = $(this).serialize();
      $(".modal").modal('hide');
      $("#counterEdit").html(length);
      $("#reassureEdit").modal('show');
    });



    /**
     * Munculkan edit page
     */
    function choice(string, id) {
      var array = JSON.parse("[" + string + "]");

      // console.log(array.length)
      for(j = 0; j < array.length; j++) {
        if (array[j] == id) {
          return 'selected';
        }
      }
    }
    $("#editor").on('click', function() {
      $("#editBuku").modal('show');

      var build = "";
      var data = serial;

      $.ajax({
        url: '/penulis/edit_data_buku',
        type: 'get',
        dataType: 'json',
        data: data,
        success: function(data) {
          if (data['success'] == 1) {
            build += "<div class='row'>";
            for(i = 1; i <= length; i++) {
              book_id = "book_id_" + i;
              book_name = "book_name_" + i;
              book_title = "book_title_" + i;
              publisher = "publisher_" + i;
              subcategory_ids = "subcategory_ids_" + i;
                            
              asset = "{{ asset('img/book_page/') }}" + "/" + data[book_name] + "_page_1.jpg";
              // " + (data[data_category_id] == '{{ $kategori->id }}' ? 'selected' : '') + "
              options = "\
              @forelse($kategori_opsi as $kategori)\
              <optgroup label='{{ ucwords(str_replace('_', ' ', $kategori->category_name)) }}'>\
                @forelse ($kategori->subcategory as $subkategori)\
                    <option " + choice(data[subcategory_ids], '{{ $subkategori->id }}') + " value='{{ $subkategori->id }}'>{{ ucwords(str_replace('_', ' ', $subkategori->subcategory_name)) }}</option>\
                  @empty\
                  @endforelse\
                @empty\
                @endforelse\
              ";
              
              build += "\
                  <input type='hidden' name='book_id_" + i + "' value='" + data[book_id] + "' />\
                  <div class='col-sm-12 col-md-4'>\
                    <div class='row mb-3 mx-1 text-center' style='border: 5px dashed #AAA; color: #AAA'>\
                      <div class='col-12' id='thumbnail'>\
                        <img class='my-3' style='width: 100%' src='" + asset + "' />\
                      </div>\
                    </div>\
                  </div>\
                  <div class='col-sm-12 col-md-8'>\
                    <div class='input-group mb-3'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-book'></i>\
                        </span>\
                      </div>\
                      <input type='text' name='book_title_" + i + "' class='form-control' placeholder='Nama Buku' value='" + data[book_title] + "'>\
                    </div>\
                    <div class='input-group mb-3'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-globe'></i>\
                        </span>\
                      </div>\
                      <input type='text' name='publisher_" + i +"' class='form-control' placeholder='Nama Penerbit' value='" + data[publisher] + "' />\
                    </div>\
                    <div class='input-group'>\
                      <div class='input-group-prepend'>\
                        <span class='input-group-text'>\
                          <i class='fas fa-tags'></i>\
                        </span>\
                      </div>\
                      <select name='categories_" + i + "[]' class='selectpicker form-control' data-live-search='true' multiple>" + options + "</select>\
                    </div>\
                  </div>\
                </div>\
              </div>";
                          
              if (i != length) {
                build += "<hr class='mt-0' style='border-top: 1px solid rgba(0, 0, 0, 0.1) !important' />";
              }
              
              build += "<div class='row'>";
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
      length = $(".card.selected").length;
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
        $("#selectables").html(length + " buku dipilih, untuk buku yang dipilih:");
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