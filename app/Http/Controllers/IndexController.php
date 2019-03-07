<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Index;

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
        
        return view('buku.index', compact('content'));
    }
    public function daftar_penulis()
    {
        $content = Index::where('setting_for', 'daftar_penulis')->first();

        return view('kontributor.index', compact('content'));
    }
    public function tentang()
    {
        return view('tentang');
    }
}
