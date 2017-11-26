<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    public $table = 'admin';


    protected $fillable = ['id','name','password','phone'];

    public $timestamps = false;
}
