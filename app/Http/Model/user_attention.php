<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_attention extends Model
{
    public $table = 'user_attention';

    protected $fillable = ['id','gid','uid'];

    public $timestamps = false;
}
