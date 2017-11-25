@extends('admins/layout/admin')

@section('title','热门微博列表') 

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>热门微博列表</span>
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
                
              
                <div class="mws-form-row">
                    <label class="mws-form-label">微博内容</label>
                    <div class="mws-form-item">
                        <textarea class="large" cols="" rows="" readonly disabled="disabled">{{$content->content}}</textarea>
                    </div>
                    <label class="mws-form-label">发布时间：{{date('Y-m-d h:s:i',$content->time)}}</label>
                    <label class="mws-form-label">转发数量：{{$content->fnum}}    评论数量：{{$content->rnum}}   点赞数量：{{$content->pnum}}</label>
                    
                </div>
            </div>
         
        </div>
    </div>
</div>
@endsection
<!-- 
