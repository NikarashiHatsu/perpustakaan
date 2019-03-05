<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Book;
use App\Category;
use App\Subcategory;

class PenulisController extends Controller
{
    public function index() {
        $change = 0;
        if (Auth::user()->logged == 0) {
            $change = 1;
        }

        return view('penulis.index', compact('change'));
    }
    public function buku() {
        return view('penulis.buku');
    }
    public function pengaturan() {
        return view('penulis.pengaturan');
    }
    


    /**
     * Store (CREATE)
     */
    public function store_buku(Request $request) {
        $file = $request->file('upload');
        $time = time();
        $book_name = "book_" . $time;
        $pdf = $file->move('pdf/', $book_name . '.pdf');
        $subcat = "";

        $img = new \Imagick('pdf/' . $book_name . '.pdf');
        $img->setImageFormat('jpg');
        $count = 1;

        foreach($img as $page) {
            $page->writeImage("img/book_page/" . $book_name . '_page_' . $count . '.jpg');
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
     * List (Read)
     */
    public function list_buku() {
        $buku = Book::where('user_id', Auth::user()->id)->get();
        $kategori = Category::all();
        $kategori_opsi = Category::all();

        return view('penulis.list.list_buku', compact('buku', 'kategori', 'kategori_opsi'));
    }



    /**
     * Put (UPDATE)
     */
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

    
    
    /**
     * Destroy (DELETE)
     */
    public function delete_buku(Request $request) {
        if (Hash::check($request->password_reconfirm, Auth::user()->password)) {
            for($i = 1; $i <= $request->max; $i++) {
                $string = "data_" . $i;
                $book = Book::find($request->$string);
                unlink("pdf/" . $book->book_name . '.pdf');
                for($j = 1; $j <= $book->page_count; $j++) {
                    unlink("img/book_page/" . $book->book_name . "_page_" . $j . ".jpg");
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
     * MISC
     */
    public function thumbnail_creator(Request $request) {
        $file = $request->file('upload');
        $pdf_name = "eLib-" . time() . '.pdf';
        $thumbnail_name = "eLib-" . time() . '.jpg';
        $file->move('temp_pdf', $pdf_name);
        
        $img = new \Imagick('temp_pdf/' . $pdf_name . '[0]');
        $img->setImageFormat('jpg');
        $img->writeImage('temp_img/' . $thumbnail_name);

        $data['success'] = 1;
        $data['nama_asli'] = $file->getClientOriginalName();
        $data['pdf'] = $pdf_name;
        $data['thumbnail'] = $thumbnail_name;
        return json_encode($data);
    }
    public function deletor(Request $request) {
        $pdf = $request->pdf;
        $img = $request->img;

        unlink("temp_pdf/" . $pdf);
        unlink("temp_img/" . $img);
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
}
