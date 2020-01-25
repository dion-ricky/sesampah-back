<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVouchers extends Model
{
    //
    protected $fillable = [
        'user_id',
        'voucher_id',
        'is_valid',
        'received_date',
        'used_date',
    ];
}
