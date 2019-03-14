<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting_for', 'fa_icon', 'content',
    ];
}
