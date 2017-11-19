@extends('homes/layout/home')


@section('content')

<div class="list_des">
                                                            
<div class="subinfo_box clearfix">
    
        <span class="subinfo_face ">
            <img src="{{$res->photo == NULL ? '/homes/uploads/default.jpg' : $res->photo}}" alt="" width="20" height="20">
        </span>
    
        <span class="subinfo S_txt2">
        {{$res->nickName}}
        </span>
   
    <span class="subinfo S_txt2">
        {{date('Y-m-d H:i:s',$res->time)}} 
    </span>
  
</div>
<h3 class="list_title_s">
    <div>
      {{$res->content}}
    </div>
</h3>
</div>

<hr>
<h3 class="list_title_s">
    <div>
      评论：
    </div>
</h3>


<!-- 评论内容 -->


<div class="list_des" style="height:60px;border-radius:10px;padding-left:10px;background-color: #F2F2F5;">
@foreach($replay as $k=>$v)
<div class="subinfo_box clearfix">
    
        <span class="subinfo_face ">
            <img src="{{$v->photo == NULL ? '/homes/uploads/default.jpg' : $res->photo}}" alt="" width="20" height="20">
        </span>
    
        <span class="subinfo S_txt2">
        {{$v->nickName}}
        </span>
   
    <span class="subinfo S_txt2">
        {{date('Y-m-d H:i:s',$v->time)}} 
    </span>
  
</div>
<h3 class="list_title_s">
    <div>
      {{$v->content}}
    </div>
</h3>
@endforeach
</div>

@endsection