<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDownload extends Model
{
    public function jurusan()
    {
        return $this->hasMany('App\User', 'jurusan', 'jurusan');
    }
}
