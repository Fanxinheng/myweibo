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

            <form action="/admin/advert" method="get" class="">

                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select name="paging" size="1" aria-controls="DataTables_Table_1">
                            <option value="5" @if($request->paging == "5" ) selected="selected" @endif>
                               5
                            </option>

                            <option value="10" @if($request->paging == "10" ) selected="selected" @endif>
                               10
                            </option>
                            <option value="25" @if($request->paging == "25" ) selected="selected" @endif>
                               25
                            </option>
                            <option value="50" @if($request->paging == "50" ) selected="selected" @endif>
                                50
                            </option>
                        </select>
                        页
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        关键字:
                        <input type="text" name="search" value="{{ $request['search']}}" aria-controls="DataTables_Table_1" >
                    </label>
                        <button class="btn btn-default">搜索</button>
                </div>

            </form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                        <tr role="row">
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                商户名
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">
                                链接地址
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 300px;" aria-label="Platform(s): activate to sort column ascending">
                                图片
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">
                                广告添加时间
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">
                                广告状态
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
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
                                        <center><img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->pic}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:100px;" id="img">
                                        </center>
                                    </td>
                                    <td class=" ">
                                        <center> {{date("Y年m月d日 H:i:s",$v->time+8*60*60)}}</center>
                                    </td>
                                    <td class=" ">
                                        <center> {{$v->status == 0 ? '开启' : '关闭'}}</center>
                                    </td>
                                    <td class=" ">
                                        <center>
                                            <a href="/admin/advert/{{$v->id}}/edit">
                                            <input type="submit" class="btn btn-default" value="修改"></a>
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


            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

                {!! $res->appends($request->all())->render() !!}

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