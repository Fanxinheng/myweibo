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
            友情链接列表
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

            <form action="/admin/link" method="get" >

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

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            商户名
                        </th>
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="Browser: activate to sort column ascending">
                            友情链接
                        </th>
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="Platform(s): activate to sort column ascending">
                            添加时间
                        </th>
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">
                            链接状态
                        </th>
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>

                <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach ($res as $k => $v)
                        <tr class="even" id="link{{$v->id}}"">
                            <td class=" ">
                                <center>{{$v->user}}</center>
                            </td>
                            <td class=" ">
                                <center>{{$v->link}}</center>
                            </td>
                            <td class=" ">
                                <center>{{date('Y年m月d日 H:i:s',$v->time)}}</center>
                            </td>
                            <td class=" ">
                                <center>{{$v->status == 0 ? "上线" : "下线"}} </center>
                            </td>
                            <td class=" ">
                                <center>
                                    <a href="/admin/link/{{$v->id}}/edit">
                                        <input type="submit" class="btn btn-default" value="修改"/>
                                    </a>
                                        <button class="btn btn-default" onclick="link_delete({{$v->id}})">删除</button>
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

     <script type="text/javascript">

            function link_delete(id){

                layer.confirm('您确定要删除此链接吗？', {
                  btn: ['确定','取消'] //按钮
              },function(){
                 $.ajax({
                    type: "post",
                    url: "/admin/link/"+id,
                    data: {id:id,_token:'{{csrf_token()}}',_method:'delete'},

                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)

                        //移除标签
                        $('#link'+id).remove();

                        layer.msg('链接删除成功:)', {icon: 1});
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        layer.msg("链接删除失败，请检查网络后重试", {icon:2 ,})
                    }
                });

                },function(){

                });
        }

            </script>

@endsection

