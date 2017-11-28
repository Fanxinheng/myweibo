@extends('admins/layout/admin')

@section('title','网站配置修改')

@section('content')

@if(session('msg'))
    <div class="mws-form-message success">
                                
        {{session('msg')}}

    </div>
@endif
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>网站配置修改</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form id="logo_form" class="mws-form" method="post" enctype="multipart/form-data">
    		<div class="mws-form-block">
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站原LOGO</label>
    				<div class="mws-form-item">
    					<img src="http://ozsrs9z8f.bkt.clouddn.com/{{$config[0]->logo}}" style="width:80px;height:27px;" id="img1">
    				</div>
    			</div>

    			<div class="mws-form-row">
                    <label class="mws-form-label">上传网站新LOGO</label>
                    
                    <input type="file" name="logo" value="" id="logo" onchange="edit()">
                    
            </div> 
    		</div>
    		<div class="mws-button-row">  
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


    //修改logo
    function edit()
    {
       uploadImage(); 
    }

    function uploadImage() {
    //判断是否有选择上传文件
    //input type file
        var imgPath = $("#logo").val();
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
        var formData = new FormData($( "#logo_form" )[0]);
        $.ajax({
            type: "post",
            url: "/admin/logo/dologo",
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
                $('#img1').attr('src','http://ozsrs9z8f.bkt.clouddn.com/'+data);
                layer.msg("网站LOGO修改成功！", {icon:1 ,})

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                layer.msg("上传失败，请检查网络后重试", {icon:2 ,})
            }
        });
    }


    
</script>

@endsection