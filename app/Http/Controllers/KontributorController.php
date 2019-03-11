<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\BookView;
use App\BookDownload;

class KontributorController extends Controller
{
    public function index()
    {
        return view('kontributor.index');
    }
    public function detail_penulis($id_penulis)
    {
        $penulis = User::find($id_penulis);
        
        if($penulis->role == 1 || $penulis->role == 2) {
            $unduh_akumulatif = 0;
            $lihat_akumulatif = 0;
            $tahun = getdate()['year'];
            $bulan = getdate()['mon'];

            /**
             * Data buku yang diunduh
             */
            $books = Book::where('user_id', $penulis->id)->get();
            $i = 1;
            foreach($books as $book) {
                for ($i = 1; $i <= $bulan; $i++) {
                    if($i < 10) {
                        $i = "0" . $i;
                    }
                    $count = BookDownload::where('created_at', 'like', $tahun . '-' . $i . '%')
                                        ->where('book_id', $book->id)->count();
                    $unduh_akumulatif += $count;
                }
            }
            /**
             * Data buku yang dilihat
             */
            $books = Book::where('user_id', $penulis->id)->get();
            foreach($books as $book) {
                for ($i = 1; $i <= $bulan; $i++) {
                    if($i < 10) {
                        $i = "0" . $i;
                    }
                    $count = BookView::where('created_at', 'like', $tahun . '-' . $i . '%')
                                        ->where('book_id', $book->id)->count();
                    $lihat_akumulatif += $count;
                }
            }

            return view('kontributor.detail', compact('penulis', 'lihat_akumulatif', 'unduh_akumulatif'));
        } else {
            abort(404);
        }
    }
}
