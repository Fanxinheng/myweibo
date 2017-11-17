<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class point extends Model
{
    public $table = 'point';

    protected $fillable = ['id','uid','tid','pid','time','status'];

    public $timestamps = false;
}
