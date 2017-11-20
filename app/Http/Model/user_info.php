<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    public $table = 'user_info';

    public function user()
    {
        return $this->belongsTo('App\Http\user','id');
    }

}
