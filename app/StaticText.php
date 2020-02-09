<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticText extends Model
{
    //
    protected $fillable = [
        'name',
        'value'
    ];
}
