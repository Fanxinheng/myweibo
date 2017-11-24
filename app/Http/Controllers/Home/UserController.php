<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests;
use App\Http\Model\contents;
use App\Http\Model\point;
use App\Http\Model\replay;
use App\Http\Model\forward;
use App\Http\Model\user_info;

use App\Http\Controllers\Controller;

use \DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id=1;
        $res = contents::where('uid','=',$id)->get();
        $rev = user_info::where('uid','=',$id)->first();
        return view('homes.user.index',['res'=>$res,'rev'=>$rev]);
    }

    public function photo()
    {
        return view('homes.user.photo');
    }

    public function point()
    {
        $pid=1;    
        $res = point::where('pid',$pid)->with(['content','users'])->get();
        $rev = point::where('pid',$pid)->first();
        return view('homes.user.point',['res'=>$res,'rev'=>$rev]);
    }

    public function delete($id)
    {
        $res = contents::where('cid',$id)->delete();
        return redirect('/home/user');
    }

    public function replay()
    {
        $uid = 1;
       
       
        $res = replay::where(['uid'=>$uid])->with(['content','user_info'])->get();


        return view('homes.user.replay',['res'=>$res]);
    }

    public function forward()
    {
        $uid = 1;
        $res = forward::where(['uid'=>$uid])->with(['content','user_info'])->get();
        // var_dump($res);
        return view('homes.user.forward',['res'=>$res]);
        // echo "123";
    }

}
