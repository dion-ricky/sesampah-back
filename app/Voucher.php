<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    protected $fillable = [
        'sponsor_id',
        'asset_id',
        'title',
        'description',
        'available_from',
        'valid_until',
    ];
}
