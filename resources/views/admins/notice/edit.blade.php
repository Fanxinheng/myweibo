@extends('admins/layout/admin')

@section('title','公告修改')

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>公告修改</span>
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
    	<form action="/admin/notice/{{$res->id}}" method="post" class="mws-form" enctype="multipart/form-data">
    		<div class="mws-form-inline">
			<div class="mws-form-row">
                <label class="mws-form-label" style="width:125px;">系统公告修改</label>
                    <div class="mws-form-item">
                    标题:<input type="text" class="large" name="title" value="{{$res->title}}">
                    </div>
                <div class="mws-form-item">
                    内容:<textarea class="large" name="content">{!!$res->content!!}</textarea>
                </div>
            </div>
    		</div>
    		<div class="mws-button-row">
    		<input type="submit" onclick="changetext(this)" class="btn btn-default" value="保存">
    		{{csrf_field()}}
            {{ method_field('PUT') }}
    		</div>
            </form>
    	</form>
    </div>
</div>

@endsection


@section('js')
<script type="text/javascript">
	$('.mws-form-message').delay(3000).slideUp(1000);

        function changetext(id)
        {
            layer.msg('公告已修改');
        }
</script>
@endsection