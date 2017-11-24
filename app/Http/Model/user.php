<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user extends Model

{
    public $table = 'user';

    protected $fillable = ['id','phone','password'];

    public $timestamps = false;

	
    public function user_info()
    {

        return $this->hasOne('App\Http\user_info','uid');
    }


}
