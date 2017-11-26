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
    	<form action="/admin/config/update" class="mws-form" method="post">
    		<div class="mws-form-block">
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="name" value="{{$config->name}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站版权</label>
    				<div class="mws-form-item">
    					<input type="text" class="large" name="bank" value="{{$config->bank}}">
    				</div>
    			</div>
    			
    		</div>
    		<div class="mws-button-row">
                {{csrf_field()}}
    			<input type="submit" class="btn" value="修改">
                
    		</div>
    	</form>
    </div>
</div>

@endsection


@section('js')

<script type="text/javascript">
	// alert($);
	
	$('.mws-form-message').delay(3000).slideUp(1000);
</script>

@endsection