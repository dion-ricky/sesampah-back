<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    //
    protected $fillable = [
        'kecamatan_id',
        'kelurahan',
        'kode_pos'
    ];
}
