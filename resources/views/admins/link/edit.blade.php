@extends('admins/layout/admin')

@section('title','友情链接修改')

@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>友情链接修改</span>
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
            <form action="/admin/link/{{ $res->id }}" class="mws-form" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">


                    <div class="mws-form-row">
                        <label class="mws-form-label">商户名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="user" value="{{ $res->user }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">链接地址</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="link" value="{{ $res->link }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="radio" name="status" value="0" @if ( $res->status == 0 ) checked @endif > <label>上线</label></li>
                                <li><input type="radio" name="status" value="1" @if ( $res->status == 1 ) checked @endif > <label>下线</label></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="mws-button-row">

                    {{csrf_field()}}

                    {{method_field('PUT')}}

                    <input type="submit" class="btn btn-default" value="修改">

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