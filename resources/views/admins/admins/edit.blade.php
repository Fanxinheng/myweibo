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
                {{method_field('PUT')}}
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

    </script>
@endsection