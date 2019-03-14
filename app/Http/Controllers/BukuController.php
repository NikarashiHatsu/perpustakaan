<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookView;

class BukuController extends Controller
{
    public function index()
    {
        return view('buku.index');
    }
    public function detail_buku($id)
    {
        $buku = Book::find($id);
        if($buku == "" || $buku == NULL) {
            abort(404, 'Buku yang Anda cari tidak ditemukan.');
        } else {
            return view('buku.detail', compact('buku'));
        }
    }
    public function halaman_buku($id, $halaman)
    {
        $buku = Book::find($id);

        return view('buku.halaman', compact('buku', 'halaman'));
    }
}
