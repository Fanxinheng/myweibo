<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class advert extends Model
{
    public $table = 'advert';

    protected $fillable = ['id','pic','link','user','time','status'];

    public $timestamps = false;
}
