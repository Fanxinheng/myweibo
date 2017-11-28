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
    	<form action="/admin/logo/dologo" class="mws-form" method="post" enctype="multipart/form-data">
    		<div class="mws-form-block">
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站原LOGO</label>
    				<div class="mws-form-item">
    					<img src="{{$logo}}" style="width:200px;height:60px;">
    				</div>
    			</div>
    			<div class="mws-form-row">
                        <label class="mws-form-label">上传网站新LOGO</label>
                        <div class="mws-form-item">
                            <input type="file" readonly="readonly" style="width: 100%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected..." name="logo">
                        </div>
                    </div>
    		</div>
    		<div class="mws-button-row">
                {{csrf_field()}}
    			<input onclick="edit(this)" type="submit" class="btn" value="修改">
                
    		</div>
    	</form>
    </div>
</div>

@endsection


@section('js')

<script type="text/javascript">
	
	$('.mws-form-message').delay(3000).slideUp(1000);
    function edit(id)
    {
        layer.msg('配置已修改')
    }
</script>

@endsection