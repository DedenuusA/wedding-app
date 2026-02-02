<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    protected $fillable = [
        'image',
        'caption',
        'kolom1',
        'kolom2',
        'kolom3',
    ];
}
