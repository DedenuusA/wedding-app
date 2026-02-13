<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterBank extends Model
{
    protected $fillable = [
           'code',
           'name',
           'logo',
           'kolom1',
           'kolom2',
           'kolom3',
    ];

}
