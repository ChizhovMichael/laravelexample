<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartType extends Model
{
    //
    protected $fillable = [
        'parttype_type', 
        'parttype_link',
    ];
}
