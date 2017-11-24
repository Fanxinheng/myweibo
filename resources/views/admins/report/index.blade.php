@extends('admins/layout/admin')

@section('title','举报管理')
 
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
        <span><i class="icon-table"></i>举报微博列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <div id="DataTables_Table_1_length" class="dataTables_length">
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>Search:
                    <input type="text" aria-controls="DataTables_Table_1">
                </label>
            </div>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">序号
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">被举报人ID
                    </th>
                    
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">被举报微博内容
                    </th>

                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">举报人ID
                    </th>
                    
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">举报理由
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 316px;" aria-label="Platform(s): activate to sort column ascending">举报时间
                    </th>
                </tr>
            </thead>  
        <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($res as $k => $v)
            <tr class="odd" align="center">

                    <!-- 举报微博序号 -->
                    <td class="  sorting_1">{{$v->id}}</td>
                    
                    <!-- 被举报者 -->
                    <td class=" ">{{$v->user_info->nickName}}</td>

                    @foreach($v->contents as $re)
                    <!-- 微博ID -->
                    <td class=" ">{{$re->content}}</td>
 
                    <!-- 举报人ID -->
                    <td class=" ">{{$re->user_info->nickName}}</td>
                    @endforeach 

                    <!-- 举报内容 -->
                    <td class=" ">{{$v->content}}</td>

                    <!-- 时间 -->
                    <td class=" ">{{$v->time}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
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

        .pagination a
        {
            color: #fff;
        }
        
        .pagination .active
        {
            background-color: #88a9eb;
            background-image: none;
            border: medium none;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset;
            color: #323232;
        }

        .pagination .disabled
        {
            color: #666666;
            cursor: default;
        }

        .pagination
        {
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