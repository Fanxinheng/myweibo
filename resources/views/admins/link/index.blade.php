@extends('admins/layout/admin')

@section('title','友情链接列表')

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
        <span>
            <i class="icon-table">
            </i>
            友情链接
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <div id="DataTables_Table_1_length" class="dataTables_length">
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
               <label>
                        关键字:
                    <input type="text" name="search" aria-controls="DataTables_Table_1">
                    <button class="btn btn-default"">搜索</button>

                </label>
            </div>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            商户名：
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="Browser: activate to sort column ascending">
                            友情链接：
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="Platform(s): activate to sort column ascending">
                            添加时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">
                            链接状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>

                <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach ($res as $k => $v)
                        <tr class="odd">
                            <td class=" ">
                                <center>{{$v->user}}</center>
                            </td>
                            <td class=" ">
                                <center>{{$v->link}}</center>
                            </td>
                            <td class=" ">
                                <center>{{date('Y年m月d日 H:i:s',$v->time+8*60*60)}}</center>
                            </td>
                            <td class=" ">
                                <center>{{$v->status == 0 ? "上线" : "下线"}} </center>
                            </td>
                            <td class=" ">
                                <center>
                                    <a href="/admin/link/{{$v->id}}/edit">
                                        <input type="submit" class="btn btn-default" value="修改">
                                    </a>
                                        <form action="/admin/link/{{$v->id}}" method="post" style="display:inline">
                                            <button class="btn btn-default">删除</button>
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                        </form>
                                </center>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
                <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                <a class="first paginate_button paginate_button_disabled" tabindex="0"
                id="DataTables_Table_1_first">
                    First
                </a>
                <a class="previous paginate_button paginate_button_disabled" tabindex="0"
                id="DataTables_Table_1_previous">
                    Previous
                </a>
                    <span>
                        <a class="paginate_active" tabindex="0">
                            1
                        </a>
                        <a class="paginate_button" tabindex="0">
                            2
                        </a>
                        <a class="paginate_button" tabindex="0">
                            3
                        </a>
                        <a class="paginate_button" tabindex="0">
                            4
                        </a>
                        <a class="paginate_button" tabindex="0">
                            5
                        </a>
                    </span>
                <a class="next paginate_button" tabindex="0" id="DataTables_Table_1_next">
                    Next
                </a>
                <a class="last paginate_button" tabindex="0" id="DataTables_Table_1_last">
                    Last
                </a>
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

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