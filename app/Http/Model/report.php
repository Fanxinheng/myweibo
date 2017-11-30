<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    public $table = 'report';

	protected $fillable = ['id','rid','uid','tid','content','time'];
	
    public $timestamps = false;


    public function user_info(){

    	return $this->hasOne('App\Http\Model\user_info','uid','rid');
    }

    public function contents(){

    	return $this->hasMany('App\Http\Model\contents','cid','tid');
    }

    


}
