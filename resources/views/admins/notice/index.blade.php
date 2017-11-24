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
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
        <label>Search: <input type="text" aria-controls="DataTables_Table_1"></label>
    </div>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
    
    <thead>
        <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">序号</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 316px;" aria-label="Platform(s): activate to sort column ascending">内容</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 221px;" aria-label="Engine version: activate to sort column ascending">时间</th>
        </tr>
    </thead>

        <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($res as $k => $v)
            <tr class="odd" align="center">              
                <td class="  sorting_1">{{$v->id}}</td>
                <td class=" ">{{$v->content}}</td>
                <td class=" ">{{$v->time}}</td>  
            </tr>
             @endforeach
        </tbody>
    </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
        <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
            <a class="first paginate_button paginate_button_disabled" tabindex="0" id="DataTables_Table_1_first">First</a>
            <a class="previous paginate_button paginate_button_disabled" tabindex="0" id="DataTables_Table_1_previous">Previous</a>
            <span>
                <a class="paginate_active" tabindex="0">1</a>
                <a class="paginate_button" tabindex="0">2</a>
                <a class="paginate_button" tabindex="0">3</a>
                <a class="paginate_button" tabindex="0">4</a>
                <a class="paginate_button" tabindex="0">5</a>
            </span>
            <a class="next paginate_button" tabindex="0" id="DataTables_Table_1_next">Next</a>
            <a class="last paginate_button" tabindex="0" id="DataTables_Table_1_last">Last</a>
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