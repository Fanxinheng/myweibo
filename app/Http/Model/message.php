<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
   public $table = 'message';

   protected $fillable = ['id','aid','uid','mess','time','status'];

    public $timestamps = false;
}
