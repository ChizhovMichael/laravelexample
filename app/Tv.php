<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tv extends Model
{
    //
    protected $fillable = [
        'tv_model', 
        'tv_condition',
        'group_id', 
        'tv_comment',
        'corp_id', 
        'tv_warehouse',
        'tv_config', 
        'part_count',
        'user_id', 
        'tv_led_cost',
        'tv_datetime', 
        'tv_timestamp',
    ];
}
