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
            <ul >
                @foreach ($errors->all() as $error)
                    <li style="font-size: 15px;list-style: none">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form id="admin_form" class="mws-form" method="post" enctype="multipart/form-data">
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
                    <label class="mws-form-label">原头像</label>
                    <div class="mws-form-item">
                        <img id="img2" src="http://ozsrs9z8f.bkt.clouddn.com/{{$res->pic}}" alt="" style="width:100px;height:100px"/>
                    </div>
                </div>
                <div class="mws-form-row">
                    <div style="padding-bottom:10px;">上传头像</div>
                    <div>
                        <input type="file" placeholder="No file selected..." name="pic" id="pic" onchange="admin_pic()">
                    </div>
                </div>
                <div class="mws-button-row">
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-default" value="修改">
                </div>
        </div>
        </form>
    </div>
</div>

@endsection


@section('js')
    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);


        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
               }
            });


        //修改管理员头像
        function admin_pic()
        {
           uploadImage(); 
        }

        function uploadImage() {
        //判断是否有选择上传文件
        //input type file
            var imgPath = $("#pic").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }
            var formData = new FormData($( "#admin_form" )[0]);
            console.log(formData);
            $.ajax({
                type: "post",
                url: "/admin/password/self",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                      // 菊花转转图
                       a = layer.load();
                  },
                success: function(data) {
                    layer.close(a);

                    console.log(data);

                    /*$('#img2').attr('src','http://ozsrs9z8f.bkt.clouddn.com/'+data);
                    layer.msg("管理员头像修改成功！", {icon:1 ,})*/

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    layer.msg("管理员头像修改失败，请检查网络后重试", {icon:2 ,})
                }
            });
        }
    </script>
@endsection