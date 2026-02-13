<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'wedding_id',
        'bank_name',
        'account_number',
        'account_holder',
        'kolom1',
        'kolom2',
        'kolom3',
        'kolom4',
        'kolom5',
    ];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    public function masterbank()
    {
        return $this->belongsTo(MasterBank::class,'bank_name','name');
    }

}
