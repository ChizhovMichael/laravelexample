<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartImg extends Model
{
    //
    protected $fillable = [
        'part_img_name', 
        'part_id',
        'part_img_main'
    ];
}
