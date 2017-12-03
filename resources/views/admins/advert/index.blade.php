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
                            rowspan="1" colspan="1" style="width: 280px;" aria-label="Browser: activate to sort column ascending">
                                链接地址
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
                                图片
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">
                                广告添加时间
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 150px;" aria-label="Engine version: activate to sort column ascending">
                                广告状态
                            </th>
                            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 250px;" aria-label="CSS grade: activate to sort column ascending">
                                操作
                            </th>
                        </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($res as $k=>$v)

                        <tr class="even" id="advert{{$v->id}}">

                                    <td class=" ">
                                        <center> {{$v->user}}</center>
                                    </td>
                                    <td class=" ">
                                        <center> {{$v->link}}</center>
                                    </td>
                                    <td class=" ">
                                        <center><img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->pic}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:100px;" id="img" >
                                        </center>
                                    </td>
                                    <td class=" ">
                                        <center> {{date("Y年m月d日 H:i:s",$v->time)}}</center>
                                    </td>
                                    <td class=" ">
                                        <center id="status{{$v->id}}"> {{$v->status == 0 ? '上架' : '下架'}}</center>
                                    </td>
                                    <td class=" ">
                                        <center>

                        <button class="btn btn-default" id="user{{$v->id}}"  onclick="advert_status({{$v->id}})">{{$v->status== 1 ? '广告上架':'广告下架'}}</button>

                                            <a href="/admin/advert/{{$v->id}}/edit">



                                            <input type="submit" class="btn btn-default" value="修改"></a>

                                            <button class="btn btn-default" onclick="advert_delete({{$v->id}})">删除</button>

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

        //切换广告状态按钮
        function advert_status(id){

            layer.confirm('您确定要修改状态此吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "get",
                    url: "/admin/advert/"+id,
                    data: {id:id},
                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)

                        //改变用户状态
                        if(data==0){
                            layer.msg('广告已上架！', {icon: 1});
                            document.getElementById('status'+id).innerHTML = '上架';
                            document.getElementById('user'+id).innerHTML = '广告下架';
                        }else{
                            layer.msg('广告已下架！', {icon: 1});
                            document.getElementById('status'+id).innerHTML = '下架';
                            document.getElementById('user'+id).innerHTML = '广告上架';
                        }

                                            },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        layer.msg("广告状态修改失败，请检查网络后重试", {icon:2 ,})
                    }
                });

                }, function(){

                });

        }

        //删除广告
        function advert_delete(id){

            layer.confirm('您确定要删除此广告吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "post",
                    url: "/admin/advert/"+id,
                    data: {id:id,_token:'{{csrf_token()}}',_method:'delete'},
                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)

                        //移除标签
                        $('#advert'+id).remove();

                        layer.msg('广告删除成功:)', {icon: 1});
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {

                        layer.msg("广告删除失败，请检查网络后重试", {icon:2 ,})
                    }
                });

                }, function(){

                });
        }
    </script>
@endsection