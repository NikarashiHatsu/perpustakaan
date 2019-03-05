<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontributorController extends Controller
{
    public function index()
    {
        return view('kontributor.index');
    }
    public function detail_kontributor($id_kontributor)
    {
        return view('kontributor.detail');
    }
}
