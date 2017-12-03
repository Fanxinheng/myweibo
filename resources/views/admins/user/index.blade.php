@extends('admins/layout/admin')

@section('title','用户列表')

@section('content')

@if(session('msg'))
    <div class="mws-form-message success">

        {{session('msg')}}

    </div>
@endif
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i>用户列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
                            <form action="/admin/index" method="get">

                                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                                    <label>用户名: <input type="text" aria-controls="DataTables_Table_1" name="search" value="{{$request['search']}}">

                                    <button type="submit" class="btn btn-default">搜索</button></label>

                                </div>
                            </form>
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                    <th style="width: 100px;" aria-label="Browser: activate to sort column ascending">
                                        手机
                                    </th>
                                    <th style="width: 180px;" aria-label="Browser: activate to sort column ascending">
                                        昵称
                                    </th>
                                    <th style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">
                                        性别
                                    </th>
                                    <th style="width: 50px;" aria-label="Engine version: activate to sort column ascending">
                                        年龄
                                    </th>
                                    <th style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                                        职业
                                    </th>
                                    <th style="width: 250px;" aria-label="CSS grade: activate to sort column ascending">
                                        邮箱
                                    </th>
                                    <th style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                                        头像
                                    </th>
                                    <th tyle="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                                        积分
                                    </th>
                                    <th style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                                        状态
                                    </th>
                                    <th style="width: 250px;" aria-label="CSS grade: activate to sort column ascending">
                                        操作
                                    </th>
                                </tr>
                            </thead>

                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($res as $k => $v)
                                <tr class="even" style="text-align: center;">
                                    <td class=" ">{{$v->phone ? $v->phone : '未设置'}}</td>
                                    <td class=" ">{{$v->nickName ? $v->nickName : '未设置'}}</td>
                                    <td class=" ">{{$v->sex ? $v->sex : '未设置'}}</td>
                                    <td class=" ">{{$v->age ? $v->age : '未设置'}}</td>
                                    <td class=" ">{{$v->work ? $v->work : '未设置'}}</td>
                                    <td class=" ">{{$v->email ? $v->email : '未设置'}}</td>
                                    <td class=" "><img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->photo}}" style="width:50px;height:50px"></td>
                                    <td class=" ">{{$v->socre}}</td>
                                    <td id="status{{$v->uid}}">{{$v->status == 0 ? '正常' : '冻结'}}</td>
                                    <td>
                                        <a href="/admin/index/{{$v->uid}}"><button class="btn btn-default">查看微博</button></a>
                                            <button class="btn btn-default" onclick="user_edit({{$v->uid}})" id="user{{$v->uid}}">{{$v->status == 1 ? '恢复用户' : '冻结用户'}}</button>
                                        <a href="/admin/news/{{$v->uid}}"><button class="btn btn-default">系统消息</button></a>
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

        //冻结用户
        function user_edit(id){

            layer.confirm('您确定要修改此用户状态吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "post",
                    url: "/admin/index/"+id,
                    data: {id:id,_token:'{{csrf_token()}}',_method:'put'},
                    
                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)

                        //改变用户状态
                        if(data==1){
                            layer.msg('用户已冻结！', {icon: 1});
                            document.getElementById('status'+id).innerHTML = '冻结';
                            document.getElementById('user'+id).innerHTML = '恢复用户';
                        }else{
                            layer.msg('用户已恢复！', {icon: 1});
                            document.getElementById('status'+id).innerHTML = '正常';
                            document.getElementById('user'+id).innerHTML = '冻结用户';
                        }

                        

                        
                        
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