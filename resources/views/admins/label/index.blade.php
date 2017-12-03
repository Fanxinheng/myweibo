@extends('admins/layout/admin')

@section('title','标签列表')

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
            标签列表
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

            <form action="/admin/label" method="get" class="">



            </form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="Browser: activate to sort column ascending">
                            标签名称
                        </th>
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="Platform(s): activate to sort column ascending">
                            操作
                        </th>

                    </tr>
                </thead>

                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($res as $k => $v)
                        <tr class="even" id="label{{$v->id}}">
                            <td >
                                <center>{{$v->id }}</center>
                            </td>
                            <td class=" ">
                                <center>{{$v->lcontent}}</center>
                            </td>
                            <td class=" ">
                                <center>
                                    <a href="/admin/label/{{$v->id}}/edit">
                                        <input type="submit" class="btn btn-default" value="修改">
                                    </a>
                                        
                                    <button class="btn btn-default" onclick="label_delete({{$v->id}})">删除</button>
                                              
                                      
                                </center>


                            </td>
                        </tr>

                    @endforeach

                </tbody>
                </table>
                    <div class="dataTables_info" id="DataTables_Table_1_info">

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

        //删除标签
        function label_delete(id){

            layer.confirm('您确定要删除此标签吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "post",
                    url: "/admin/label/"+id,
                    data: {id:id,_token:'{{csrf_token()}}',_method:'delete'},
                    
                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)

                        //移除标签
                        $('#label'+id).remove();

                        layer.msg('标签删除成功:)', {icon: 1});
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        layer.msg("标签删除失败，请检查网络后重试", {icon:2 ,})  
                    }
                });

                }, function(){
                        
                });
        }

    </script>
@endsection