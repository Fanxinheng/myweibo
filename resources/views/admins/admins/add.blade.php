@extends('admins/layout/admin')

@section('title','管理员添加')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>管理员添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul >
                @foreach ($errors->all() as $error)
                    <li style="font-size: 15px;list-style: none">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        @if(session('msg'))
        <div class="mws-form-message error">
                                    
            {{session('msg')}}

        </div>
        @endif


    
        <form action="/admin/admins/" class="mws-form" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="name" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">密码</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" name="password" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">确认密码</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" name="repass">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="phone" >
                    </div>
                </div>

                <div class="mws-form-row">

                    <div style="padding-bottom: 10px;">上传头像</div>
                    <div >
                        <input type="file" readonly="readonly" class="fileinput-preview" placeholder="No file selected..." name="pic">

                    </div>
                </div>
            <div class="mws-button-row">

                {{csrf_field()}}
                <input type="submit" class="btn" value="添加">
                
            </div>
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