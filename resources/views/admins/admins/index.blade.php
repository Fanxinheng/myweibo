@extends('admins/layout/admin')

@section('title','管理员列表')

@section('content')

@if(session('msg'))
    <div class="mws-form-message success">

        {{session('msg')}}

    </div>
@endif

<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i>管理员列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper"><table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                    <th  style="width: 150px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                                    <th  style="width: 220px;" aria-label="Browser: activate to sort column ascending">用户名</th>
                                    <th  style="width: 220px;" aria-label="Platform(s): activate to sort column ascending">手机</th>
                                    <th  style="width: 220px;" aria-label="Platform(s): activate to sort column ascending">头像</th>
                                    <th  style="width: 210px;" aria-label="Engine version: activate to sort column ascending">操作</th>
                                </tr>
                            </thead>

                        <tbody role="alert" aria-live="polite" aria-relevant="all" style="text-align: center;">
                            @foreach($admin as $k => $v)
                            <tr class="even" id="admin{{$v->id}}">
                                <td class=" ">{{$v->id}}</td>
                                <td class=" ">{{$v->name}}</td>
                                <td class=" ">{{$v->phone}}</td>

                                <td class=" "><img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->pic}}" alt="" style="width:50px;height:50px"/></td>

                                <td>
                                    <button class="btn btn-default" onclick="admins_delete({{$v->id}})">删除</button>

                                </td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                    <style type="text/css">
                        .pagination li{background-color: #444444; border-left: 1px solid rgba(255, 255, 255, 0.15); border-right: 1px solid rgba(0, 0, 0, 0.5); box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset; color: #fff; cursor: pointer; display: block; float: left; font-size: 12px; height: 20px; line-height: 20px; outline: medium none; padding: 0 10px; text-align: center; text-decoration: none; } .pagination .disabled{color: #666666; cursor: default; } .pagination .active{background-image: none; border: medium none; box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset; color: #323232; background-color: #c5d52b; }
                        ul{margin:0px; }
                    </style>

                    {!! $admin->appends($request->all())->render() !!}
                    </div>
                    </div>
                    </div>

                </div>

@endsection


@section('js')
    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);

        //删除管理员
        function admins_delete(id){

            layer.confirm('您确定要删除此管理员吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "post",
                    url: "/admin/admins/"+id,
                    data: {id:id,_token:'{{csrf_token()}}',_method:'delete'},
                    
                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)

                        if(data==1){

                            //移除标签
                             $('#admin'+id).remove();
                             layer.msg('管理员删除成功: )', {icon: 1});
                        }else{
                             layer.msg('管理员删除失败: (', {icon: 2});

                        }
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        layer.msg("管理员删除失败，请检查网络后重试", {icon:2 ,})  
                    }
                });

                }, function(){
                        
                });
        }
    </script>
@endsection