<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribeUS extends Model
{
    //
    public $table = 'subscribe_us';
    public $fillable = ['email', 'first_name'];
}
