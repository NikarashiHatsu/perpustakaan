<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Index;
use App\User;
use App\Book;
use App\BookView;
use App\BookDownload;
use App\Subcategory;

class IndexController extends Controller
{
    public function index()
    {   
        $content = Index::where('setting_for', 'index')->first();

        return view('index', compact('content'));
    }
    public function daftar_buku()
    {
        $content = Index::where('setting_for', 'daftar_buku')->first();
        $buku = Book::all();
        
        return view('buku.index', compact('content', 'buku'));
    }
    public function daftar_penulis()
    {
        $content = Index::where('setting_for', 'daftar_penulis')->first();
        $penulis = User::where('role', '!=', 0)->get();

        return view('kontributor.index', compact('content', 'penulis'));
    }
    public function tentang()
    {
        return view('tentang');
    }
    public function kategori($nama_kategori)
    {
        $subkategori = Subcategory::where('subcategory_name', $nama_kategori)->first()->id;
        $buku = Book::where('subcategory_ids', 'like', '%' . $subkategori . '%')->get();
        
        return view('buku.kategori', compact('buku'));
    }

    public function tambah_view(Request $request)
    {
        $book_view = new BookView;
        $book_view->book_id = $request->id_buku;
        $book_view->jurusan = $request->jurusan;
        $book_view->save();

        $data['success'] = 1;
        return json_encode($data);
    }
    public function unduh_buku(Request $request) {
        $book_download = new BookDownload;
        $book_download->book_id = $request->id_buku;
        $book_download->jurusan = $request->jurusan;
        $book_download->save();
        
        $data['success'] = 1;
        return json_encode($data);
    }
    public function unduh(Request $request) {
        $buku = Book::find($request->id_buku);

        return view('buku.unduh', compact('buku'));
    }
}
