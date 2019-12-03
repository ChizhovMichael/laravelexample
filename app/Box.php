<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    //
    protected $fillable = [
        'boxes_number',
        'boxes_name',
        'boxes_description'
    ];

    public $timestamps = false;
}
