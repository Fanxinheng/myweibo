@extends('admins/layout/admin')

@section('title','管理员列表')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>用户微博列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
           
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row"><th style="width: 200px;" aria-label="Browser: activate to sort column ascending">用户名</th><th style="width: 400px;" aria-label="Browser: activate to sort column ascending">微博内容</th><th  style="width: 150px;" aria-label="Platform(s): activate to sort column ascending">转发数量</th><th  style="width: 150px;" aria-label="Engine version: activate to sort column ascending">评论数量</th><th style="width: 150px;" aria-label="CSS grade: activate to sort column ascending">点赞数量</th><th style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">热门</th><th  style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">举报</th></tr>
            </thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($res as $k => $v)
                <tr class="@if($k%2 == 0) odd @else even @endif" style="text-align: center;">
                    <td class=" ">{{$nickName}}</td>
                    <td class=" ">{{$v->content}}</td>
                    <td class=" ">{{$v->fnum}}</td>
                    <td class=" ">{{$v->rnum}}</td>
                    <td class=" ">{{$v->pnum}}</td>
                    <td class=" ">{{$v->hot == 0 ? '否' : '是'}}</td>
                    <td class=" ">{{$v->report == 0 ? '否' : '是'}}</td>
                 </tr>
                @endforeach
        </tbody>
    </table>
    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
    <style type="text/css">
        .pagination li{background-color: #444444; border-left: 1px solid rgba(255, 255, 255, 0.15); border-right: 1px solid rgba(0, 0, 0, 0.5); box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset; color: #fff; cursor: pointer; display: block; float: left; font-size: 12px; height: 20px; line-height: 20px; outline: medium none; padding: 0 10px; text-align: center; text-decoration: none; } .pagination .disabled{color: #666666; cursor: default; } .pagination .active{background-image: none; border: medium none; box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset; color: #323232; background-color: #c5d52b; } 
        ul{margin:0px; }
    </style>
    {!! $res->render() !!}
    </div>
    </div>
    </div>
</div>

@endsection


@section('js')
    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);
       
    </script>
@endsection