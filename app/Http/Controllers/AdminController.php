<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Footer; 
use App\Book;
use App\BookView;
use App\BookDownload;
use App\Category;
use App\Subcategory;
use App\Index;
use Fpdf;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('revalidate');
        $this->middleware('admin');
        $this->middleware('auth');
    }

    public function index() {
        $active = 'index';

        $tahun = getdate()['year'];
        $bulan = getdate()['mon'];
        $define_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        $data_bulan = "";
        $data_diunggah = "";
        $data_diunduh = "";
        $data_dilihat = "";

        for ($i = 1; $i <= $bulan; $i++) {
            $data_bulan .= '"' . $define_bulan[$i - 1] . '",';
        }
        for ($i = 1; $i <= $bulan; $i++) {
            if($i < 10) {
                $i = "0" . $i;
            }
            $count = Book::where('created_at', 'like', $tahun . '-' . $i . '%')->count();
            $data_diunggah .= '"' . $count . '",';
        }
        for ($i = 1; $i <= $bulan; $i++) {
            if($i < 10) {
                $i = "0" . $i;
            }
            $count = BookDownload::where('created_at', 'like', $tahun . '-' . $i . '%')->count();
            $data_diunduh .= '"' . $count . '",';
        }
        for ($i = 1; $i <= $bulan; $i++) {
            if($i < 10) {
                $i = "0" . $i;
            }
            $count = BookView::where('created_at', 'like', $tahun . '-' . $i . '%')->count();
            $data_dilihat .= '"' . $count . '",';
        }

        return view('admin.index', compact('active', 'data_bulan', 'data_diunggah', 'data_diunduh', 'data_dilihat'));
    }
    public function penulis() {
        $active = 'penulis';
        return view('admin.penulis', compact('active'));
    }
    public function siswa() {
        $active = 'siswa';
        return view('admin.siswa', compact('active'));
    }
    public function buku() {
        $active = 'buku';
        return view('admin.buku', compact('active'));
    }
    public function kategori() {
        $active = 'kategori';
        return view('admin.kategori', compact('active'));
    }
    public function subkategori() {
        $active = 'subkategori';
        return view('admin.subkategori', compact('active'));
    }
    public function laporan() {
        $active = 'laporan';
        $bulan = getdate()['mon'];
        $tahun = getdate()['year'];
        $define_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $data_bulan = "";
        $data_diunduh = "";
        $data_dilihat = "";

        $grafik_baca_akl = BookView::where('jurusan', 'akuntansi_dan_keuangan_lembaga')->count();
        $grafik_baca_bdp = BookView::where('jurusan', 'bisnis_daring_pemasaran')->count();
        $grafik_baca_mm = BookView::where('jurusan', 'multimedia')->count();
        $grafik_baca_otkp = BookView::where('jurusan', 'otomatisasi_dan_tata_kelola_perkantoran')->count();
        $grafik_baca_pkm = BookView::where('jurusan', 'perbankan_dan_keuangan_mikro')->count();
        $grafik_baca_upw = BookView::where('jurusan', 'usaha_perjalanan_wisata')->count();
        $grafik_baca_anonymous = BookView::where('jurusan', 'anonymous')->count();
        $grafik_baca = $grafik_baca_akl . ", " . $grafik_baca_bdp . ", " . $grafik_baca_mm . ", " . $grafik_baca_otkp . ", " . $grafik_baca_pkm . ", " . $grafik_baca_upw . ", " . $grafik_baca_anonymous;

        $grafik_unduh_akl = BookDownload::where('jurusan', 'akuntansi_dan_keuangan_lembaga')->count();
        $grafik_unduh_bdp = BookDownload::where('jurusan', 'bisnis_daring_pemasaran')->count();
        $grafik_unduh_mm = BookDownload::where('jurusan', 'multimedia')->count();
        $grafik_unduh_otkp = BookDownload::where('jurusan', 'otomatisasi_dan_tata_kelola_perkantoran')->count();
        $grafik_unduh_pkm = BookDownload::where('jurusan', 'perbankan_dan_keuangan_mikro')->count();
        $grafik_unduh_upw = BookDownload::where('jurusan', 'usaha_perjalanan_wisata')->count();
        $grafik_unduh = $grafik_unduh_akl . ", " . $grafik_unduh_bdp . ", " . $grafik_unduh_mm . ", " . $grafik_unduh_otkp . ", " . $grafik_unduh_pkm . ", " . $grafik_unduh_upw;

        for ($i = 1; $i <= $bulan; $i ++) {
            $data_bulan .= '"' . $define_bulan[$i - 1] . '"';
            $data_bulan .= ",";
        }
        for ($i = 1; $i <= $bulan; $i++) {
            if($i < 10) {
                $i = "0" . $i;
            }
            $count = BookDownload::where('created_at', 'like', $tahun . '-' . $i . '%')->count();
            $data_diunduh .= '"' . $count . '",';
        }
        for ($i = 1; $i <= $bulan; $i++) {
            if($i < 10) {
                $i = "0" . $i;
            }
            $count = BookView::where('created_at', 'like', $tahun . '-' . $i . '%')->count();
            $data_dilihat .= '"' . $count . '",';
        }
        
        return view('admin.laporan', compact('active', 'data_bulan', 'grafik_baca', 'grafik_unduh', 'data_diunduh', 'data_dilihat'));
    }
    public function pengaturan() {
        $active = 'pengaturan';

        $index_content = Index::where('setting_for', 'index')->first();
        $book_content = Index::where('setting_for', 'daftar_buku')->first();
        $writer_content = Index::where('setting_for', 'daftar_penulis')->first();

        $facebook = Footer::where('link_for', 'facebook')->first();
        $twitter = Footer::where('link_for', 'twitter')->first();
        $instagram = Footer::where('link_for', 'instagram')->first();
        return view('admin.pengaturan', compact('active', 'index_content', 'book_content', 'writer_content', 'facebook', 'twitter', 'instagram'));
    }


    
    /**
     * Store (CREATE)
     */
    public function store_penulis(Request $request) {
        for($i = 1; $i <= $request->max; $i++) {
            $full_name = "full_name_" . $i;
            $access_code = "access_code_" . $i;
            $password = "password_" . $i;
            
            $user = new User;
            $user->name = $request->$full_name;
            $user->access_code = $request->$access_code;
            $user->password = Hash::make($request->$password);
            $user->reveal = $request->$password;
            $user->role = 1;
            $user->save();
        }
        
        $data['success'] = 1;
        return json_encode($data);
    }
    public function store_siswa(Request $request) {
        for($i = 1; $i <= $request->max; $i++ ) {
            $full_name = "full_name_" . $i;
            $access_code = "access_code_" . $i;
            $password = "password_" . $i;

            $user = new User;
            $user->name = $request->$full_name;
            $user->access_code = $request->$access_code;
            $user->password = Hash::make($request->$password);
            $user->reveal = $request->$password;
            $user->kelas = $request->tambah_kelas;
            $user->jurusan = $request->tambah_jurusan;
            $user->rombel = $request->tambah_rombel;
            $user->role = 0;
            $user->save();
        }

        $data['success'] = 1;
        return json_encode($data);
    }
    public function store_kategori(Request $request) {
        for($i = 1; $i <= $request->max; $i++) {
            $category_name = "category_" . $i;
            $color_scheme = "color_scheme_" . $i;
            
            $category = new Category;
            $category->category_name = strtolower(str_replace(' ', '_', $request->$category_name));
            $category->color_scheme = strtolower(str_replace(' ', '_', $request->$color_scheme));
            $category->save();
        }

        $data['success'] = 1;
        return json_encode($data);
    }
    public function store_subkategori(Request $request) {
        for($i = 1; $i <= $request->max; $i++) {
            $subcategory_name = "subcategory_" . $i;
            $category_id = "category_id_" . $i;
            
            $subcategory = new Subcategory;
            $subcategory->subcategory_name = strtolower(str_replace(' ', '_', $request->$subcategory_name));
            $subcategory->category_id = $request->$category_id;
            $subcategory->save();
        }

        $data['success'] = 1;
        return json_encode($data);
    }
    public function store_buku(Request $request) {
        if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/pdf/')) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . '/pdf/', 0777);
        }
        if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/img/book_page/')) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . '/img/book_page/', 0777);
        }

        $file = $request->file('upload');
        $time = time();
        $book_name = "book_" . $time;
        $pdf = $file->move($_SERVER['DOCUMENT_ROOT'] . '/pdf/', $book_name . '.pdf');
        $subcat = "";

        $img = new \Imagick();
        $img->setResolution(100, 100);
        $img->readImage($_SERVER['DOCUMENT_ROOT'] . '/pdf/' . $book_name . '.pdf');
        $img->setImageFormat('png');
        $count = 1;
        
        foreach($img as $page) {
            $page->writeImage($_SERVER['DOCUMENT_ROOT'] . '/img/book_page/' . $book_name . '_page_' . $count . '.jpg');
            $count++;
        }

        for($i = 0; $i < count($request->categories); $i++) {
            $subcat .= strtolower(str_replace(' ', '_', $request->categories[$i]));
            if (($i + 1) != count($request->categories)) {
                $subcat .= ",";
            }
        }

        $buku = new Book;
        $buku->user_id = Auth::user()->id;
        $buku->book_title = $request->book_title;
        $buku->book_name = $book_name;
        $buku->publisher = $request->publisher;
        $buku->page_count = ($count - 1);
        $buku->subcategory_ids = $subcat;
        $buku->save();

        $data['success'] = 1;
        return json_encode($data);
    }


    /**
     * List (READ)
     */
    public function list_siswa(Request $request) {
        $kelas = $request->kelas;
        $jurusan = $request->jurusan;
        $rombel = $request->rombel;

        $class_info = $kelas . " " . ucwords(str_replace('_', ' ', $jurusan)) . " " . $rombel;
        $siswa = User::where([['role', 0], ['kelas', $kelas], ['jurusan', $jurusan], ['rombel', $rombel]])->get();
        $count = count($siswa);

        return view('admin.list.list_siswa', compact('siswa', 'count', 'class_info', 'kelas'));
    }
    public function list_penulis() {
        $penulis = User::where('role', 1)->get();
        $count = count($penulis);

        return view('admin.list.list_penulis', compact('penulis', 'count'));
    }
    public function list_kategori() {
        $kategori = Category::all();

        return view('admin.list.list_kategori', compact('kategori'));
    }
    public function list_subkategori() {
        $kategori = Category::all();
        $kategori_opsi = Category::all();
        $kategori_opsi_lain = Category::all();

        return view('admin.list.list_subkategori', compact('kategori', 'kategori_opsi', 'kategori_opsi_lain'));
    }
    public function list_buku() {
        $buku = Book::all();
        $kategori = Category::all();
        $kategori_opsi = Category::all();

        return view('admin.list.list_buku', compact('buku', 'kategori', 'kategori_opsi'));
    }



    /**
     * Update (PUT)
     * Every update needs password revalidation
     */
    public function update_penulis(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $full_name = "full_name_" . $i;
                $access_code = "access_code_" . $i;
                $id = "user_id_" . $i;
                
                $user = User::find($request->$id);
                $user->name = $request->$full_name;
                $user->access_code = $request->$access_code;
                $user->update();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function update_siswa(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $full_name = "full_name_" . $i;
                $access_code = "access_code_" . $i;
                $id = "user_id_" . $i;
                
                $user = User::find($request->$id);
                $user->name = $request->$full_name;
                $user->access_code = $request->$access_code;
                $user->update();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function update_siswa_ganti_kelas(Request $request) {

        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "data_" . $i;

                $user = User::find($request->$string);
                $user->kelas = strtolower(str_replace(' ', '_', $request->ganti_kelas));
                $user->jurusan = strtolower(str_replace(' ', '_', $request->ganti_jurusan));
                $user->rombel = strtolower(str_replace(' ', '_', $request->ganti_rombel));
                $user->update();
            }

            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);  
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function update_kategori(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "category_id_" . $i;
                $category_name = "category_" . $i;
                $color_scheme = "color_scheme_" . $i;
                
                $category = Category::find($request->$string);
                $category->category_name = strtolower(str_replace(' ', '_', $request->$category_name));
                $category->color_scheme = $request->$color_scheme;
                $category->update();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function update_subkategori(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "subcategory_id_" . $i;
                $subcategory_name = "subcategory_" . $i;
                $category_id = "category_id_" . $i;
                
                $category = Subcategory::find($request->$string);
                $category->category_id = $request->$category_id;
                $category->subcategory_name = strtolower(str_replace(' ', '_', $request->$subcategory_name));
                $category->update();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function update_buku(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $subcat = "";
                $string = "book_id_" . $i;
                $book_title = "book_title_" . $i;
                $publisher = "publisher_" . $i;
                $categories = "categories_" . $i;

                for($j = 0; $j < count($request->$categories); $j++) {
                    $subcat .= $request->$categories[$j];
                    if (($j + 1) != count($request->$categories)) {
                        $subcat .= ",";
                    }
                }
                
                $book = Book::find($request->$string);
                $book->book_title = $request->$book_title;
                $book->publisher = $request->$publisher;
                $book->subcategory_ids = $subcat;
                $book->update();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function update_footer(Request $request) {
        if (Hash::check($request->password, Auth::user()->password)) {
            $settings = array("facebook", "twitter", "instagram");
            foreach($settings as $setting) {
                $name = Footer::where('link_for', $setting)->first();
                $name->value = $request->$setting;
                $name->update();
            }

            $data['success'] = 1;
            return json_encode($data);
        } else {
            $data['success'] = 0;
            return json_encode($data);
        }
    }
    public function update_deskripsi_index(Request $request) {
        if (Hash::check($request->password, Auth::user()->password)) {
            $index = Index::where('setting_for', $request->target)->first();
            $index->fa_icon = $request->fa_icon;
            $index->content = $request->description;
            $index->update();

            $data['success'] = 1;
            return json_encode($data);
        } else {
            $data['success'] = 0;
            return json_encode($data);
        }
    }
    public function update_deskripsi_buku(Request $request) {
        if (Hash::check($request->password, Auth::user()->password)) {
            $index = Index::where('setting_for', $request->target)->first();
            $index->fa_icon = $request->fa_icon;
            $index->content = $request->description;
            $index->update();

            $data['success'] = 1;
            return json_encode($data);
        } else {
            $data['success'] = 0;
            return json_encode($data);
        }
    }
    public function update_deskripsi_penulis(Request $request) {
        if (Hash::check($request->password, Auth::user()->password)) {
            $index = Index::where('setting_for', $request->target)->first();
            $index->fa_icon = $request->fa_icon;
            $index->content = $request->description;
            $index->update();

            $data['success'] = 1;
            return json_encode($data);
        } else {
            $data['success'] = 0;
            return json_encode($data);
        }
    }



    /**
     * Destroy (DELETE)
     */
    public function delete_penulis(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "data_" . $i;
                $user = User::find($request->$string);
                $user->delete();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function delete_siswa(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "data_" . $i;
                $user = User::find($request->$string);
                $user->delete();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function delete_kategori(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "data_" . $i;
                $category = Category::find($request->$string);
                foreach($category->subcategory as $subcategory) {
                    $subcategory->delete();
                }
                $category->delete();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function delete_subkategori(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "data_" . $i;
                $category = Subcategory::find($request->$string);
                $category->delete();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);         
        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }
    public function delete_buku(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "data_" . $i;
                $book = Book::find($request->$string);
                unlink($_SERVER['DOCUMENT_ROOT'] . "/pdf/" . $book->book_name . '.pdf');
                for($j = 1; $j <= $book->page_count; $j++) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . "/img/book_page/" . $book->book_name . "_page_" . $j . ".jpg");
                }
                $book->delete();
            }
            
            $data['password_failure'] = 0;
            $data['success'] = 1;

            return json_encode($data);    

        } else {
            $data['password_failure'] = 1;
            $data['success'] = 0;

            return json_encode($data);
        }
    }



    /**
     * EDIT DATA
     */
    public function edit_data_user(Request $request) {
        $data = array();
        
        for($i = 1; $i <= $request->max; $i++) {
            $string = "data_" . $i;
            $user = User::find($request->$string);
            $data['user_' . $i . '_id'] = $user->id;
            $data['user_' . $i . '_name'] = $user->name;
            $data['user_' . $i . '_access_code'] = $user->access_code;
        }

        $data['success'] = 1;
        return json_encode($data);
    }
    public function edit_data_kategori(Request $request) {
        $data = array();

        for($i = 1; $i <= $request->max; $i++) {
            $string = "data_" . $i;
            $category = Category::find($request->$string);
            $data['category_' . $i . '_id'] = $category->id;
            $data['category_' . $i . '_name'] = ucwords(str_replace('_', ' ', $category->category_name));
            $data['category_' . $i . '_color_scheme'] = $category->color_scheme;
        }

        $data['success'] = 1;
        return json_encode($data);
    }
    public function edit_data_subkategori(Request $request) {
        $data = array();

        for($i = 1; $i <= $request->max; $i++) {
            $string = "data_" . $i;
            $subcategory = Subcategory::find($request->$string);
            $data['subcategory_' . $i . '_id'] = $subcategory->id;
            $data['subcategory_' . $i . '_name'] = ucwords(str_replace('_', ' ', $subcategory->subcategory_name));
            $data['category_id_' . $i] = $subcategory->category_id;
        }

        $data['success'] = 1;
        return json_encode($data);
    }
    public function edit_data_buku(Request $request) {
        $data = array();

        for($i = 1; $i <= $request->max; $i++) {
            $string = "data_" . $i;
            $book = Book::find($request->$string);
            $data['book_id_' . $i] = $book->id;
            $data['book_title_' . $i] = $book->book_title;
            $data['book_name_' . $i] = $book->book_name;
            $data['publisher_' . $i] = $book->publisher;
            $data['subcategory_ids_' . $i] = $book->subcategory_ids;
        }

        $data['success'] = 1;
        return json_encode($data);
    }



    /**
     * CHECKER
     */
    public function checker_access_code(Request $request) {
        $ac = $request->access_code;
        if(User::where('access_code', $ac)->count() == 0) {
            $data['success'] = 1;
            return json_encode($data);
        } else {
            $data['success'] = 0;
            return json_encode($data);
        }
    }



    /**
     * MISC
     */
    public function foto_profil(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/img/profile_pictures/')) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . '/img/profile_pictures/', 0777);
            }

            $file = $request->file('upload');
            $time = time();
            $profile_picture = "profile_" . $time;
            $profile_db = "profile_" . $time . '.' . $file->getClientOriginalExtension();
            $move = $file->move($_SERVER['DOCUMENT_ROOT'] . '/img/profile_pictures/', $profile_picture . '.jpg');

            $user = User::find(Auth::user()->id);
            if($user->profile_picture != NULL) {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/img/profile_pictures/" . $user->profile_picture);
            }
            $user->profile_picture = $profile_db;
            $user->update();

            $data['success'] = 1;
            return json_encode($data);
        } else {
            $data['success'] = 0;
            return json_encode($data);
        }
    }
    public function thumbnail_creator(Request $request) {
        if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/temp_pdf/')) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . '/temp_pdf/', 0777);
        }
        if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/temp_img/')) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . '/temp_img/', 0777);
        }

        $file = $request->file('upload');
        $pdf_name = "eLib-" . time() . '.pdf';
        $thumbnail_name = "eLib-" . time() . '.jpg';
        $file->move($_SERVER['DOCUMENT_ROOT'] . '/temp_pdf/', $pdf_name);
        
        $img = new \Imagick($_SERVER['DOCUMENT_ROOT'] . '/temp_pdf/' . $pdf_name . '[0]');
        $img->setImageFormat('jpg');
        $img->writeImage($_SERVER['DOCUMENT_ROOT'] . '/temp_img/' . $thumbnail_name);

        $data['success'] = 1;
        $data['nama_asli'] = $file->getClientOriginalName();
        $data['pdf'] = $pdf_name;
        $data['thumbnail'] = $thumbnail_name;
        return json_encode($data);
    }
    public function deletor(Request $request) {
        $pdf = $request->pdf;
        $img = $request->img;

        unlink($_SERVER['DOCUMENT_ROOT'] . "/temp_pdf/" . $pdf);
        unlink($_SERVER['DOCUMENT_ROOT'] . "/temp_img/" . $img);
    }
    public function change_password(Request $request) {
        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->update();
            
            $data['success'] = 1;
            return json_encode($data);
        } else {
            $data['success'] = 0;
            $data['old_password_response'] = "Kata Sandi Salah";
            return json_encode($data);
        }
    }
    public function change_access_code(Request $request) {
        if (Hash::check($request->confirm_password, Auth::user()->password)) {
            if ($request->old_access_code == Auth::user()->access_code) {
                if (User::where('access_code', $request->new_access_code)->count() == 0) {
                    $user = User::find(Auth::user()->id);
                    $user->access_code = $request->new_access_code;
                    $user->update();
                    
                    $data['success'] = 1;
                    $data['response'] = 0;
                    return json_encode($data);
                } else {
                    $data['success'] = 0;
                    $data['response'] = 3;
                    $data['new_access_code_response'] = "Kode Akses sudah dipakai";
                    return json_encode($data);
                }
            } else {
                $data['success'] = 0;
                $data['response'] = 2;
                $data['access_code_response'] = "Kode Akses salah";
                return json_encode($data);
            }
        } else {
            $data['success'] = 0;
            $data['response'] = 1;
            $data['password_response'] = "Kata Sandi salah";
            return json_encode($data);
        }
    }
    public function pdfy()
    {
        $array_bulan = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
        $define_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $bulan = $define_bulan[getdate()['mon'] - 1];
        $tahun = getdate()['year'];

        $grafik_baca = array();
        $grafik_baca['akuntansi_dan_keuangan_lembaga'] = BookView::where('jurusan', 'akuntansi_dan_keuangan_lembaga')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_baca['bisnis_daring_pemasaran'] = BookView::where('jurusan', 'bisnis_daring_pemasaran')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_baca['multimedia'] = BookView::where('jurusan', 'multimedia')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_baca['otomatisasi_dan_tata_kelola_perkantoran'] = BookView::where('jurusan', 'otomatisasi_dan_tata_kelola_perkantoran')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_baca['perbankan_dan_keuangan_mikro'] = BookView::where('jurusan', 'perbankan_dan_keuangan_mikro')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_baca['usaha_perjalanan_wisata'] = BookView::where('jurusan', 'usaha_perjalanan_wisata')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_baca['anonymous'] = BookView::where('jurusan', 'anonymous')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_baca['total'] = BookView::where('created_at', 'like', '%' . $tahun . '%')->count();

        $grafik_unduh = array();
        $grafik_unduh['akuntansi_dan_keuangan_lembaga'] = BookDownload::where('jurusan', 'akuntansi_dan_keuangan_lembaga')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_unduh['bisnis_daring_pemasaran'] = BookDownload::where('jurusan', 'bisnis_daring_pemasaran')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_unduh['multimedia'] = BookDownload::where('jurusan', 'multimedia')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_unduh['otomatisasi_dan_tata_kelola_perkantoran'] = BookDownload::where('jurusan', 'otomatisasi_dan_tata_kelola_perkantoran')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_unduh['perbankan_dan_keuangan_mikro'] = BookDownload::where('jurusan', 'perbankan_dan_keuangan_mikro')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_unduh['usaha_perjalanan_wisata'] = BookDownload::where('jurusan', 'usaha_perjalanan_wisata')->where('created_at', 'like', '%' . $tahun . '%')->count();
        $grafik_unduh['total'] = BookDownload::where('created_at', 'like', '%' . $tahun . '%')->count();

        $jurusan = Category::where('category_name', 'jurusan')->first()->subcategory;
        $books = Book::all();

        $pdf = new Fpdf('l', 'mm', 'A4');
        $pdf::SetTitle("Laporan Tahun " . $tahun);
        // Halaman 1
        $pdf::AddPage();
        $pdf::SetFont('Arial', 'B', 18);
        $pdf::Cell(0, 6, "Laporan Tahun " . $tahun, 0, "", "C");
        $pdf::SetFont('Arial', '', 8);
        $pdf::Ln();
        $pdf::Cell(0, 10, "Per-tanggal " . getdate()['mday'] . " " . $bulan . " " . $tahun, 0, "", "C");
        $pdf::Ln();
        $pdf::Ln();
        
        $pdf::SetFont('Arial', '', 11);
        $pdf::Cell(0, 11, "Frekuensi Pembaca Tahun " . $tahun . " Berdasarkan Jurusan:");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::Cell(100, 8, "Jurusan", 1, "", "C");
        $pdf::Cell(43.5, 8, "#Buku Dibaca", 1, "", "C");
        $pdf::Cell(43.5, 8, "#Buku Diunduh", 1, "", "C");
        $pdf::SetFont('Arial','',11);
        foreach($jurusan as $jurusan) {
            $pdf::Ln();
            $pdf::Cell(100, 8, ucwords(str_replace('_', ' ', $jurusan->subcategory_name)), 1, "", "L");
            $pdf::Cell(43.5, 8, $grafik_baca[$jurusan->subcategory_name] . " buku", 1, "", "C");
            $pdf::Cell(43.5, 8, $grafik_unduh[$jurusan->subcategory_name] . " buku", 1, "", "C");
        }
        $pdf::Ln();
        $pdf::Cell(100, 8, "=====Anonim=====", 1, "", "C");
        $pdf::Cell(43.5, 8, $grafik_baca['anonymous'] . " buku", 1, "", "C");
        $pdf::Cell(43.5, 8, '-', 1, "", "C");
        $pdf::Ln();
        $pdf::Cell(100, 8, "=====Total=====", 1, "", "C");
        $pdf::Cell(43.5, 8, $grafik_baca['total'] . " buku", 1, "", "C");
        $pdf::Cell(43.5, 8, $grafik_unduh['total'] . " buku", 1, "", "C");
        $pdf::Ln();
        $pdf::Ln();

        $pdf::SetFont('Arial', '', 11);
        $pdf::Cell(0, 11, "Frekuensi Pembaca Tahun " . $tahun . " Secara Keseluruhan:");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::Cell(100, 8, "Bulan", 1, "", "C");
        $pdf::Cell(43.5, 8, "#Buku Dibaca", 1, "", "C");
        $pdf::Cell(43.5, 8, "#Buku Diunduh", 1, "", "C");
        $pdf::SetFont('Arial','',11);
        foreach($array_bulan as $array_bulan) {
            $pdf::Ln();
            $pdf::Cell(100, 8, $define_bulan[$array_bulan - 1], 1, "", "C");
            $moon = $array_bulan;
            if ($moon < 10) {
                $moon = '0' . $moon;
            }

            $pdf::Cell(43.5, 8, BookView::where('created_at', 'like', '%' . $tahun . '-' . $moon . '%')->count() . " buku", 1, "", "C");
            $pdf::Cell(43.5, 8, BookDownload::where('created_at', 'like', '%' . $tahun . '-' . $moon . '%')->count() . ' buku', 1, "", "C");

            if ($array_bulan == getdate()['mon']) { 
                break;
            }
        }
        $pdf::Ln();
        $pdf::Cell(100, 8, "=====Total=====", 1, "", "C");
        $pdf::Cell(43.5, 8, $grafik_baca['total'] . " buku", 1, "", "C");
        $pdf::Cell(43.5, 8, $grafik_unduh['total'] . " buku", 1, "", "C");

        // Halaman 2
        $pdf::AddPage();
        $pdf::SetFont('Arial', 'B', 18);
        $pdf::Cell(0, 6, "Laporan Tahun " . $tahun, 0, "", "C");
        $pdf::SetFont('Arial', '', 8);
        $pdf::Ln();
        $pdf::Cell(0, 10, "Per-tanggal " . getdate()['mday'] . " " . $bulan . " " . $tahun, 0, "", "C");
        $pdf::Ln();
        $pdf::Ln();
        
        $pdf::SetFont('Arial', '', 11);
        $pdf::Cell(0, 11, "Daftar buku:");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::Cell(50, 8, "Nama Buku", 1, "", "C");
        $pdf::Cell(50, 8, "Penulis", 1, "", "C");
        $pdf::Cell(40, 8, "Penerbit", 1, "", "C");
        $pdf::Cell(23.5, 8, "#Dibaca", 1, "", "C");
        $pdf::Cell(23.5, 8, "#Diunduh", 1, "", "C");
        $pdf::SetFont('Arial','',11);
        $counter = 1;
        foreach($books as $book) {
            $pdf::Ln();
            $pdf::Cell(50, 8, $book->book_title, 1, "", "L");
            $pdf::Cell(50, 8, $book->user->name, 1, "", "L");
            $pdf::Cell(40, 8, $book->publisher, 1, "", "L");
            $pdf::Cell(23.5, 8, BookView::where('book_id', $book->id)->where('created_at', 'like', '%' . $tahun . '%')->count() . "x", 1, "", "C");
            $pdf::Cell(23.5, 8, BookDownload::where('book_id', $book->id)->where('created_at', 'like', '%' . $tahun . '%')->count() . "x", 1, "", "C");
            if($counter > 25) {
                $pdf::AddPage();
                $counter = 1;
            } else {
                $counter++;
            }
        }

        $pdf::Output();
        exit;
    }
}
