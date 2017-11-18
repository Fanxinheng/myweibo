@extends('admins/layout/admin')

@section('title','管理员列表')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>用户微博列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div class="mws-form">
            <div class="mws-form-block">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item" >
                        <input type="text" class="small" readonly value="{{$nickName}}" disabled="disabled">
                    </div>
                </div>
                
               @foreach($res as $k=>$v)
                <div class="mws-form-row">
                    <label class="mws-form-label">微博内容</label>
                    <div class="mws-form-item">
                        <textarea class="large" cols="" rows="" readonly disabled="disabled">{{$v->content}}</textarea>
                    </div>
                    <label class="mws-form-label">发布时间：{{date('Y-m-d h:s:i',$v->time)}}</label>
                    <label class="mws-form-label">转发数量：{{$v->fnum}}    评论数量：{{$v->rnum}}   点赞数量：{{$v->pnum}}</label>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


@section('js')
    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);
       
    </script>
@endsection