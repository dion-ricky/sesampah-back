<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameItem extends Model
{
    //
    protected $fillable = [
        'name',
        'price',
        'asset_id',
    ];
}
