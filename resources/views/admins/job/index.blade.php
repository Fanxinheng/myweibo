@extends('admins/layout/admin')

@section('title','用户职业列表')

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
            用户职业列表
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
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
                            用户职业
                        </th>
                        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 300px;" aria-label="Platform(s): activate to sort column ascending">
                            操作
                        </th>

                    </tr>
                </thead>

                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($job as $k => $v)
                        <tr class="even" id="job{{$v->id}}">
                            <td >
                                <center>{{$v->id }}</center>
                            </td>
                            <td >
                                <center>{{$v->job}}</center>
                            </td>
                            <td >
                                <center>
                                    <a href="/admin/job/{{$v->id}}/edit">
                                        <input type="submit" class="btn btn-default" value="修改">
                                    </a> 
                                    <button class="btn btn-default" onclick="job_delete({{$v->id}})">删除</button>             
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

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
               }
            });

        //职业删除
        function job_delete(id){

            layer.confirm('您确定要删除此职业吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "post",
                    url: "/admin/job/"+id,
                    data: {id:id,_token:'{{csrf_token()}}',_method:'delete'},
                    
                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)

                        //移除微博
                        $('#job'+id).remove();

                        layer.msg('职业删除成功:)', {icon: 1});
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        layer.msg("职业删除失败，请检查网络后重试", {icon:2 ,})  
                    }
                });

                }, function(){
                        
                });
        }
        
    </script>
@endsection