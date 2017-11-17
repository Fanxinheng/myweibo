<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class replay extends Model
{
    public $table = 'replay';

    protected $fillable = ['id','uid','tid','content','pid','time','status'];

    public $timestamps = false;
}
