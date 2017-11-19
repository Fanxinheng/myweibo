@extends('admins/layout/admin')

@section('title','广告列表')

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
            广告列表
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

            <form action="/admin/advert" method="get" class=""></form>

                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select name="paging" size="1" aria-controls="DataTables_Table_1">
                            <option value="1" selected="selected">
                                1
                            </option>
                            <option value="2">
                               2
                            </option>
                            <option value="3">
                               3
                            </option>
                            <option value="100">
                                100
                            </option>
                        </select>
                        页
                    </label>
                </div>

                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        关键字:
                        <input type="text" name="search" aria-controls="DataTables_Table_1" >
                        <button class="btn btn-default">搜索</button>

                    </label>
                </div>

            </form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                        <tr role="row">
                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                商户名
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">
                                链接地址
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 300px;" aria-label="Platform(s): activate to sort column ascending">
                                图片
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">
                                广告添加时间
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">
                                广告状态
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                                操作
                            </th>
                        </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($res as $k=>$v)

                        <tr class="@if($k % 2 == 0 ) odd @else even @endif">

                                    <td class=" ">
                                        <center> {{$v->user}}</center>
                                    </td>
                                    <td class=" ">
                                        <center> {{$v->link}}</center>
                                    </td>
                                    <td class=" ">
                                        <center><img src="{{$v->pic}}" style="width:50px;height:50px" alt=""></center>
                                    </td>
                                    <td class=" ">
                                        <center> {{date("Y年m月d日 H:i:s",$v->time+8*60*60)}}</center>
                                    </td>
                                    <td class=" ">
                                        <center> {{$v->status == 0 ? '开启' : '关闭'}}</center>
                                    </td>
                                    <td class=" ">
                                        <center>
                                            <a href="/admin/advert/{{$v->id}}/edit"><input type="submit" class="btn btn-default" value="修改"></a>
                                            <form action="/admin/advert/{{$v->id}}"" method="post" style="display:inline">
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