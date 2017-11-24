@extends('admins/layout/admin')

@section('title','公告列表')

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
        <span><i class="icon-table"></i>公告列表</span>
    </div>
    <div class="mws-panel-body no-padding">
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">

    <thead>
        <tr role="row">
            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">序号</th>
            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 316px;" aria-label="Platform(s): activate to sort column ascending">内容</th>
            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 221px;" aria-label="Engine version: activate to sort column ascending">时间</th>
        </tr>
    </thead>

        <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($res as $k => $v)
            <tr class="odd" align="center">
                <td class="">{{$v->id}}</td>
                <td class=" ">{{$v->content}}</td>
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
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);

    </script>
@endsection