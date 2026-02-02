<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    protected $fillable =[
        'bride_name',
        'groom_name',
        'bride_parent',
        'groom_parent',
        'date',
        'time',
        'location',
        'maps_link',
        'story',
        'theme',
        'music_url',
        'slug',
        'kolom1',
        'kolom2',
        'kolom3',
    ];
}
