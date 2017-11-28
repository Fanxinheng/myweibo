@extends('admins/layout/admin')

@section('title','管理员修改')

@section('content')

@if(session('msg'))
    <div class="mws-form-message success">

        {{session('msg')}}

    </div>
@endif

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>管理员修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="font-size: 15px;list-style: none">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <form action="/admin/admins/{{$res->id}}" class="mws-form" method="post" enctype="multipart/form-data">
        <div class="mws-form-inline">
            <div class="mws-form-row">
                <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="name" value="{{$res->name}}">
                    </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">手机号码</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" readonly disabled="disabled" value="{{$res->phone}}">
                    </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">原图片</label>
                    <div class="mws-form-item">
                        <img src="{{$res->pic}}" alt="" style="width:100px;height:100px"/>
                    </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">上传头像</label>
                <div class="mws-form-item">
                    <input type="file" readonly="readonly" style="width: 100%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected..." name="pic">
                </div>
            </div>
            <div class="mws-button-row">

            {{csrf_field()}}
            {{method_field('PUT')}}
            <input onclick="change(this)" type="submit" class="btn btn-default" value="修改">

            </div>
        </div>
    </form>
    </div>
</div>

@endsection


@section('js')
    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);
        function change(id)
        {
            layer.msg('修改成功')
        }
    </script>
@endsection