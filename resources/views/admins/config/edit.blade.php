@extends('admins/layout/admin')

@section('title','网站配置修改')

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>网站配置修改</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form action="form_layouts.html" class="mws-form">
    		<div class="mws-form-block">
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站logo</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站版权</label>
    				<div class="mws-form-item">
    					<input type="text" class="large">
    				</div>
    			</div>
    			
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" class="btn btn-danger" value="修改">
    			
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