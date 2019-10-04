<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoxPart extends Model
{
    //
    protected $fillable = [
        'part_id',
        'box_box',
        'box_hide',
        'box_timestamp'
    ];
}
