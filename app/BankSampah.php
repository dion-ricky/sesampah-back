<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    //
    protected $fillable = [
        'name',
        'no_telp',
        'alamat',
        'kelurahan_id',
    ];
}
