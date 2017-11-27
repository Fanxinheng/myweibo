@extends('admins/layout/admin')

@section('title','管理员头像修改')

@section('content')

@if(session('msg'))
    <div class="mws-form-message success">

        {{session('msg')}}

    </div>
@endif
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>管理员头像修改</span>
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



        <form action="/admin/admins/{{$res->id}}" class="mws-form"  method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">原图片</label>
                    <div class="mws-form-item">
                        <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$res->pic}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:100px;" id="img">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">上传头像</label>
                    <div class="mws-form-item">
                        <input type="file" readonly="readonly" style="width: 100%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected..." name="pic" id="pic">

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