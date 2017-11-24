@extends('admins/layout/admin')

@section('title','管理员列表')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>系统消息</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form action="/admin/send/{{$user->uid}}" class="mws-form" method="post">
            <div class="mws-form-block">
                <div class="mws-form-row">
                    <label class="mws-form-label">From：管理员</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="" readonly disabled="disabled" value="{{$admin->name}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">To：用户名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" readonly disabled="disabled" value="{{$user->nickName}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">消息内容</label>
                    <div class="mws-form-item">
                        <textarea class="large" cols="" rows="" name="content"></textarea>
                    </div>
                </div>
            </div> 
            <input type="hidden" name="time" value="{{time()}}">

            {{csrf_field()}}
            <div class="mws-button-row">
                <input type="submit" class="btn" value="发送">
            </div>

           
        </form>
    </div>
</div>
@endsection


@section('js')
    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);
       
    </script>
@endsection