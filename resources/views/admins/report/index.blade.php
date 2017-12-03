@extends('admins/layout/admin')

@section('title','举报管理')

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
        <span><i class="icon-table"></i>举报微博列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">

                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 338px;" aria-label="Browser: activate to sort column ascending">举报人
                    </th>

                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 500px;" aria-label="Browser: activate to sort column ascending">被举报微博内容
                    </th>

                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">被举报人
                    </th>

                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 316px;" aria-label="Platform(s): activate to sort column ascending">举报时间
                    </th>

                    <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">操作
                    </th>
                </tr>
            </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($res as $k => $v)
             @foreach($v->contents as $re)
            <tr class="even" align="center" id="report{{$re->cid}}">

                    <!-- 被举报者 -->
                    <td class=" ">{{$v->user_info->nickName}}</td>

                   
                    <!-- 微博ID -->
                    <td class=" ">{{$re->content}}</td>

                    <!-- 举报人ID -->
                    <td class=" ">{{$re->user_info->nickName}}</td>
                    

                    <!-- 时间 -->
                    <td class=" ">{{date('Y-m-d H:i:s',$v->time)}}</td>

                    <!-- 操作 -->
                    <td class=" ">
                        <button onclick="shan({{$re->cid}})" class="btn btn-default">删除</button>
                    </td>
                    @endforeach
            </tr>
            @endforeach
            </tbody>
        </table>
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
    
    //举报删除
   function shan(id){
    
    //获取要删除举报的id
    layer.confirm('您确定要删除此举报微博吗？', {
      btn: ['确定','取消'] //按钮
        }, 
        function(){
        $.ajax({
        type: "post",
        url: '/admin/report/'+id,
        data: {id:id,_token:'{{csrf_token()}}',_method:'delete'},

        beforeSend:function(){
        //加载样式
        a = layer.load(0, {shade: false});},

        success: function(data) {
 
            //关闭加载样式
            layer.close(a)
            
            //移除微博
            $('#report'+id).remove();
            layer.msg('举报微博删除成功!', {icon: 1});
            },
        })
    });      
}
    </script>
@endsection