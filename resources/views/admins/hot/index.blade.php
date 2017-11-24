@extends('admins/layout/admin')

@section('title','热门微博列表')

@section('content')

@if(session('create'))
    <div class="mws-form-message success">

        {{session('create')}}

    </div>
@endif

@if(session('delete'))
    <div class="mws-form-message success">

        {{session('delete')}}

    </div>
@endif


@if(session('edit'))
        <div class="mws-form-message success">

            {{session('edit')}}

        </div>
@endif

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>热门列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
    <thead>
      <tr role="row">
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width:150px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 300px;" aria-label="Browser: activate to sort column ascending">发博人</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width:300px;" aria-label="Platform(s): activate to sort column ascending">内容</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">时间</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-label="CSS grade: activate to sort column ascending">热门</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">举报</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">评论量</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">转发量</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">点赞量</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 550px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
    </tr>
    </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($res as $k => $v)
                <tr class="odd" align="center">
                    <td class="">{{$v->cid}}</td>
                    <td class=" ">{{$v->nickName}}</td>
                    <td class=" ">{{$v->content}}</td>
                    <td class=" ">{{$v->time}}</td>
                    <td class=" ">{{$v->hot == 0 ? '否' : '是'}}</td>
                    <td class=" ">{{$v->report == 0 ? '正常' : '举报' }}</td>
                    <td class=" ">{{$v->rnum}}</td>
                    <td class=" ">{{$v->fnum}}</td>
                    <td class=" ">{{$v->pnum}}</td>
                    <td class=" " ">
                        <a href="/admin/hot/{{$v->cid}}"><button class="btn btn-default">查看微博</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
            <style>
            .pagination li
            {
                background-color: #444444;
                border-left: 1px solid rgba(255, 255, 255, 0.15);
                border-right: 1px solid rgba(0, 0, 0, 0.5);
                box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;

                cursor: pointer;
                display: block;
                float: left;
                font-size: 12px;
                height: 20px;
                line-height: 20px;
                outline: medium none;
                padding: 0 10px;
                text-align: center;
                text-decoration: none;
            }

            .pagination a{
                color: #fff;

            }

            .pagination .active{
                background-color: #88a9eb;
                background-image: none;
                border: medium none;
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset;
                color: #323232;
            }

            .pagination .disabled{
                color: #666666;
                cursor: default;
            }

            .pagination{

                margin:0px;
            }
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

