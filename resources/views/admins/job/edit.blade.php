@extends('admins/layout/admin')

@section('title','用户职业修改')

@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>用户职业修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        
            <form action="/admin/job/{{$job->id}} " class="mws-form" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">


                    <div class="mws-form-row">
                        <label class="mws-form-label">职业名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="job" value="{{ $job->job}} ">
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