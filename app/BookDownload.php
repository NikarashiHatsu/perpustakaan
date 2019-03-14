<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDownload extends Model
{
    public function jurusan()
    {
        return $this->hasMany('App\User', 'jurusan', 'jurusan');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 'jurusan',
    ];
}
