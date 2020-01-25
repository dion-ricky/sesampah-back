<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGameItem extends Model
{
    //
    protected $fillable = [
        'user_id',
        'game_item_id',
        'received_date',
    ];
}
