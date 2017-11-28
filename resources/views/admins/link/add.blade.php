@extends('admins/layout/admin')

@section('title','链接添加')

@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>添加友情链接</span>
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


            <form action="/admin/link/" class="mws-form" method="post" enctype="multipart/form-data">
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

                </div>
                <div class="mws-button-row">

                    {{csrf_field()}}
                    <input onclick="add(this)" type="submit" class="btn btn-danger" value="添加">

                </div>
            </form>
        </div>
    </div>
@endsection


@section('js')

<script type="text/javascript">
	$('.mws-form-message').delay(3000).slideUp(1000);
    function add(id)
    {
        layer.msg('友情链接已添加')
    } 
</script>

@endsection