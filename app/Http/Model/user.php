<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{	
	public $table = 'user';

	public $timestamps = false;

    protected $fillable = ['id','phone','password'];
	
    public function user_info()
    {

        return $this->hasOne('App\Http\user_info','uid');
    }


}
