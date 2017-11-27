@extends('admins/layout/admin')

@section('title','广告添加')

@section('content')

<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>广告添加</span>
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


        	<form action="/admin/advert/" class="mws-form" method="post" enctype="multipart/form-data">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">商户名</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name="user" value="{{old('user')}}">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">链接地址</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name="link" value="{{old('link')}}">
        				</div>
        			</div>
        			<div class="mws-form-row">
                        <div style="padding-bottom: 10px;">图片</div>
                        <div>
                            <input type="file" readonly="readonly" style="width: 100%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected..." name="pic">
                        </div>
                    </div>

        		</div>
        		<div class="mws-button-row">

        			{{csrf_field()}}

                    <input type="submit" class="btn btn-default" value="添加">
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