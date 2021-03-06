<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function views() {
        return $this->hasMany('App\BookView', 'book_id', 'id');
    }
    public function downloads() {
        return $this->hasMany('App\BookDownload', 'book_id', 'id');
    }
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'book_title', 'book_name', 'publisher', 'page_count', 'subcategory_ids',
    ];
}
