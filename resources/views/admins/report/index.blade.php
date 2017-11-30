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
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">序号
                    </th>

                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">举报人ID
                    </th>
                    
                     <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">举报理由
                    </th>

                     <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">被举报人ID
                    </th>

                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">被举报微博内容
                    </th>

                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 316px;" aria-label="Platform(s): activate to sort column ascending">举报时间
                    </th>
                </tr>
            </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($res as $k => $v)
            <tr class="odd" align="center">

                    <!-- 举报微博序号 -->
                    <td class=" ">{{$v->id}}</td>
                
                @foreach($v->contents as $re)

                    <!-- 举报人 -->
                    <td class=" ">{{$re->user_info->nickName}}</td>

                    <!-- 举报理由 -->
                    <td class=" ">{{$v->content}}</td>
                    
                    <!-- 被举报人ID -->
                    <td class=" ">{{$v->user_info->nickName}}</td>

                    <!-- 被举报微博内容 -->
                    <td class=" ">{{$re->content}}</td>
             @endforeach        
                    <!-- 时间 -->
                    <td class=" ">{{$v->time}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
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