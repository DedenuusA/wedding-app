<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'quota',
        'invitation_code',
        'kolom1',
        'kolom2',
        'kolom3',
    ];
}
