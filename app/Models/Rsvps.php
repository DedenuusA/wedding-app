<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsvps extends Model
{
    protected $fillable = [
            'guest_id',
            'attendance',
            'total_guest',
            'message',
            'kolom1',
            'kolom2',
            'kolom3',
    ];
}
