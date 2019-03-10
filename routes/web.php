<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute Index 
Route::get('/', 'IndexController@index')->name('index');
Route::get('/tentang', 'IndexController@tentang')->name('tentang');
Route::post('/unduh', 'IndexController@unduh')->name('unduh_buku');
Route::post('/tambah_view', 'IndexController@tambah_view')->name('tambah_view');
Route::post('/tambah_download', 'IndexController@unduh_buku')->name('tambah_download');
    Route::get('/home', function() {
    return redirect('/');
});

// Rute Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'revalidate']], function() {
    // View Tiap Halaman
    Route::get('/', 'AdminController@index')->name('admin_dashboard');
    Route::get('/penulis', 'AdminController@penulis')->name('admin_dashboard_penulis');
    Route::get('/siswa', 'AdminController@siswa')->name('admin_dashboard_siswa');
    Route::get('/buku', 'AdminController@buku')->name('admin_dashboard_buku');
    Route::get('/kategori', 'AdminController@kategori')->name('admin_dashboard_kategori');
    Route::get('/subkategori', 'AdminController@subkategori')->name('admin_dashboard_subkategori');
    Route::get('/laporan', 'AdminController@laporan')->name('admin_dashboard_laporan');
    Route::get('/pengaturan', 'AdminController@pengaturan')->name('admin_dashboard_pengaturan');
    // ========== CRUD ==========
    // CREATE
    Route::post('/penulis', 'AdminController@store_penulis')->name('admin_store_penulis');
    Route::post('/siswa', 'AdminController@store_siswa')->name('admin_store_siswa');
    Route::post('/buku', 'AdminController@store_buku')->name('admin_store_buku');
    Route::post('/kategori', 'AdminController@store_kategori')->name('admin_store_kategori');
    Route::post('/subkategori', 'AdminController@store_subkategori')->name('admin_store_kategori');
    // READ
    Route::get('/list_penulis', 'AdminController@list_penulis')->name('admin_list_penulis');
    Route::get('/list_siswa', 'AdminController@list_siswa')->name('admin_list_siswa');
    Route::get('/list_buku', 'AdminController@list_buku')->name('admin_list_buku');
    Route::get('/list_kategori', 'AdminController@list_kategori')->name('admin_list_kategori');
    Route::get('/list_subkategori', 'AdminController@list_subkategori')->name('admin_list_subkategori');
    // UPDATE
    Route::put('/update_penulis', 'AdminController@update_penulis')->name('admin_update_penulis');
    Route::put('/update_siswa', 'AdminController@update_siswa')->name('admin_update_siswa');
    Route::put('/update_buku', 'AdminController@update_buku')->name('admin_update_buku');
    Route::put('/update_kategori', 'AdminController@update_kategori')->name('admin_update_kategori');
    Route::put('/update_subkategori', 'AdminController@update_subkategori')->name('admin_update_subkategori');
    Route::put('/update_footer', 'AdminController@update_footer')->name('admin_update_footer');
    Route::put('/update_deskripsi_halaman_index', 'AdminController@update_deskripsi_index')->name('admin_update_index');
    Route::put('/update_deskripsi_halaman_daftar_buku', 'AdminController@update_deskripsi_buku')->name('admin_update_buku');
    Route::put('/update_deskripsi_halaman_daftar_penulis', 'AdminController@update_deskripsi_penulis')->name('admin_update_penulis');
    // DELETE
    Route::delete('/delete_penulis', 'AdminController@delete_penulis')->name('admin_delete_penulis');
    Route::delete('/delete_siswa', 'AdminController@delete_siswa')->name('admin_delete_siswa');
    Route::delete('/delete_buku', 'AdminController@delete_buku')->name('admin_delete_buku');
    Route::delete('/delete_kategori', 'AdminController@delete_kategori')->name('admin_delete_kategori');
    Route::delete('/delete_subkategori', 'AdminController@delete_subkategori')->name('admin_delete_subkategori');

    // EDIT DATA
    Route::get('/edit_data_user', 'AdminController@edit_data_user')->name('admin_edit_data_user');
    Route::get('/edit_data_kategori', 'AdminController@edit_data_kategori')->name('admin_edit_data_kategori');
    Route::get('/edit_data_subkategori', 'AdminController@edit_data_subkategori')->name('admin_edit_data_subkategori');
    Route::get('/edit_data_buku', 'AdminController@edit_data_buku')->name('admin_edit_data_buku');

    // CHECKER
    Route::get('/checker/access_code', 'AdminController@checker_access_code')->name('admin_checker_access_code');

    // THUMBNAIL CREATOR
    Route::post('/thumbnail_creator', 'AdminController@thumbnail_creator')->name('admin_thumbnail_creator');
    Route::get('/deletor', 'AdminController@deletor')->name('admin_thumbnail_deletor');

    // MISC
    Route::put('/change_password', 'AdminController@change_password')->name('admin_change_password');
    Route::put('/change_access_code', 'AdminController@change_access_code')->name('admin_change_access_code');
});

// Rute penulis
Route::group(['prefix' => 'penulis', 'middleware' => ['auth', 'revalidate']], function() {
    // View Tiap Halaman
    Route::get('/', 'PenulisController@index')->name('penulis_dashboard');
    Route::get('/buku', 'PenulisController@buku')->name('penulis_dashboard_buku');
    Route::get('/pengaturan', 'PenulisController@pengaturan')->name('penulis_dashboard_pengaturan');
    // ========== CRUD ==========
    // CREATE
    Route::post('/buku', 'PenulisController@store_buku')->name('penulis_store_buku');
    // READ
    Route::get('/list_buku', 'PenulisController@list_buku')->name('penulis_list_buku');
    // UPDATE
    Route::put('/update_buku', 'PenulisController@update_buku')->name('penulis_update_buku');
    // DELETE
    Route::delete('/delete_buku', 'PenulisController@delete_buku')->name('penulis_delete_buku');
    // EDIT
    Route::get('/edit_data_buku', 'PenulisController@edit_data_buku')->name('penulis_edit_data_buku');
    // THUMBNAIL CREATOR
    Route::post('/thumbnail_creator', 'PenulisController@thumbnail_creator')->name('penulis_thumbnail_creator');
    Route::get('/deletor', 'PenulisController@deletor')->name('penulis_thumbnail_deletor');
    // MISC
    Route::put('/change_password', 'PenulisController@change_password')->name('penulis_change_password');
    Route::put('/change_access_code', 'PenulisController@change_access_code')->name('penulis_change_access_code');
});

// Rute Buku
Route::group(['prefix' => 'daftar_buku'], function() {
    Route::get('/', 'IndexController@daftar_buku')->name('index_buku');
    Route::get('/{id_buku}', 'BukuController@detail_buku')->name('detail_buku');
    Route::get('/{id_buku}/{halaman_buku}', 'BukuController@halaman_buku')->name('halaman_buku');
});

// Rute Kontributor
Route::group(['prefix' => 'daftar_penulis'], function() {
    Route::get('/', 'IndexController@daftar_penulis')->name('index_penulis');
    Route::get('/{id_penulis}', 'KontributorController@detail_penulis')->name('detail_penulis');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);