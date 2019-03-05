<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('buku.index');
    }
    public function detail_buku()
    {
        return view('buku.detail');
    }
    public function halaman_buku()
    {
        return view('buku.halaman');
    }
}
