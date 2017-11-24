@extends('admins/layout/admin')

@section('title','公告添加')

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>公告添加</span>
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
    	<form action="/admin/notice" method="post" class="mws-form" enctype="multipart/form-data">
    		<div class="mws-form-inline">       			
			<div class="mws-form-row">
                <label class="mws-form-label">系统公告</label>
                <div class="mws-form-item">
                    <textarea class="large" cols="" rows="" name="content"></textarea>
                </div>
            </div>       			
    		</div>
    		<div class="mws-button-row">
    			{{csrf_field()}}
    			<input type="submit" class="btn btn-danger" value="添加">		
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