<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class point extends Model
{
    public $table = 'point';

    public function content()
    {
    	return $this->hasOne('App\Http\Model\contents', 'cid', 'tid');
    }

    public function users()
    {
    	return $this->hasOne('App\Http\Model\user_info','uid','uid');
    }
}
