<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    //
    protected $fillable = [
        'cash_reward',
        'point_reward',
        'xp_reward',
        'start_date',
        'deadline'
    ];
}
