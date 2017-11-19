@extends('homes/layout/home')


@section('content')




    <div class="list_des">
        
        <h3 class="list_title_s">
            <div>
                {{$res->content}}
            </div>
        </h3>
        
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
    </div>
        
    <hr>

    <form action="/home/forward/store/" method="post">
        <textarea class="form-control" rows="3" name="content" style="resize:none;"></textarea>
        <input type="hidden" name="uid" value="{{$res->uid}}">
        <input type="hidden" name="tid" value="{{$res->cid}}">
        {{csrf_field()}}
        <button style="margin:5px 0 5px 605px;" class="btn btn-default">转发</button>

    </form>

<!-- 转发内容 -->

<div class="list_des" style="height:60px;border-radius:10px;padding-left:10px;background-color: #F2F2F5;">

@if($res->fnum == 0)
<h3 class="list_title_s">
    <div>
      亲，微博还没有转发，快去试试吧:)
    </div>
</h3>
@endif

@foreach($forward as $k=>$v) 
<div class="subinfo_box clearfix" >
       
        <span class="subinfo_face ">
            <img src="{{$v->photo == NULL ? '/homes/uploads/default.jpg' : $v->photo}}" alt="" width="20" height="20">
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

@section('js')
    <script type="text/javascript">
        $('.alert').delay(3000).slideUp(1000);
       
    </script>
@endsection