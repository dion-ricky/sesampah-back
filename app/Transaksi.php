<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $fillable = [
        'bank_sampah_id',
        'user_id',
        'is_incoming',
        'is_money',
        'amount',
    ];
}
