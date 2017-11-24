<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class point extends Model
{
    public $table = 'point';


    protected $fillable = ['id','uid','tid','pid','time','status'];

    public $timestamps = false;

    public function content()
    {
    	return $this->hasOne('App\Http\Model\contents', 'cid', 'tid');
    }

    public function users()
    {
    	return $this->hasOne('App\Http\Model\user_info','uid','uid');
    }

}
