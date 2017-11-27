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
                                <tr class="@if($k%2 == 0) odd @else even @endif" style="text-align: center;">
                                    <td class=" ">{{$v->phone ? $v->phone : '未设置'}}</td>
                                    <td class=" ">{{$v->nickName ? $v->nickName : '未设置'}}</td>
                                    <td class=" ">{{$v->sex ? $v->sex : '未设置'}}</td>
                                    <td class=" ">{{$v->age ? $v->age : '未设置'}}</td>
                                    <td class=" ">{{$v->work ? $v->work : '未设置'}}</td>
                                    <td class=" ">{{$v->email ? $v->email : '未设置'}}</td>
                                    <td class=" "><img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->photo}}" style="width:50px;height:50px"></td>
                                    <td class=" ">{{$v->socre}}</td>
                                    <td class=" ">{{$v->status == 0 ? '正常' : '冻结'}}</td>
                                    <td>
                                        <a href="/admin/index/{{$v->uid}}"><button class="btn btn-default">查看微博</button></a>
                                        <form action="/admin/index/{{$v->id}}" method="post" style="display:inline">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <button class="btn btn-default">{{$v->status == 1 ? '恢复用户' : '冻结用户'}}</button>

                                        </form>
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

    </script>
@endsection