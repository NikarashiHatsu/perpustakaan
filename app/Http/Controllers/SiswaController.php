<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class SiswaController extends Controller
{
    public function index() {
        $change = 0;
        if (Auth::user()->logged == 0) {
            $change = 1;
        }

        return view('siswa.index', compact('change'));
    }
    public function pengaturan() {
        return view('siswa.pengaturan');
    }

    public function change_password(Request $request) {
        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user = User::find(Auth::user()->id);
            $user->reveal = "******";
            $user->password = Hash::make($request->new_password);
            $user->logged = 1;
            $user->update();
            
            $data['success'] = 1;
            return json_encode($data);
        } else {
            $data['success'] = 0;
            $data['old_password_response'] = "Kata Sandi Salah";
            return json_encode($data);
        }
    }
}
