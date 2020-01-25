<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuest extends Model
{
    //
    protected $fillable = [
        'quest_id',
        'user_id',
        'status',
        'progress',
        'start_date',
        'finish_date',
    ];
}
