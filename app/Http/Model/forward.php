<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class forward extends Model
{
    public $table = 'forward';

    protected $fillable = ['id','uid','tid','pid','content','time','status'];

    public $timestamps = false;
}
