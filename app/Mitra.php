<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    //
    protected $fillable = [
        'user_id',
        'level',
        'xp',
        'tier',
    ];
}
