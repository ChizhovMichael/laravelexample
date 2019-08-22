<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    //
    protected $fillable = [
        'matrix_model',
        'tv_id',
        'matrix_timestamp'
    ];
}
