<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavigationAdditional extends Model
{
    //
    protected $fillable = [
        'navigation_id',
        'additional_id',
        'additional_name',
        'additional_slug',
        'show'
    ];
}
