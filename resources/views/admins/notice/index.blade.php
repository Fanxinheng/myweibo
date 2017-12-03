 @extends('admins/layout/admin')

@section('title','公告列表')

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
            <span><i class="icon-table"></i>公告列表</span>
        </div>
    <div class="mws-panel-body no-padding">
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">

    <thead>
        <tr role="row" style="font-size: 13px;">
            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">序号</th>
            
            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 255px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">标题</th>

            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 500px;">内容</th>

            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 221px;" aria-label="Engine version: activate to sort column ascending">发布时间</th>

            <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 221px;" aria-label="Engine version: activate to sort column ascending">操作</th>

        </tr>
    </thead>

        <tbody role="alert" aria-live="polite" aria-relevant="all" style="overflow:hidden;">
             @foreach($res as $k => $v)
            <tr class="even" align="center" id="notice{{$v->id}}" style="font-size: 13px;">
                <td class="">{{$v->id}}</td>
                <td class="">{{$v->title}}</td>
                <td class="" style="word-WRAP:break-word">{{$v->content}}</td>
                <td class="">{{date('Y-m-d H:i:s',$v->time)}}</td>
                <td class="">

                <a href="/admin/notice/{{$v->id}}/edit">
                <button class="btn btn-default">修改公告</button>
                </a>
                <button  onclick="shan({{$v->id}})" class="btn btn-default">删除公告</button>
                </td>
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
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);

    // 公告删除
    function shan(id){
    //获取要删除公告的id
    layer.confirm('您确定要删除此公告吗？', {
      btn: ['确定','取消'] //按钮
        }, 
        function(){
        $.ajax({
        type: "post",
        url: '/admin/notice/'+id,
        data: {id:id,_token:'{{csrf_token()}}',_method:'delete'},

        beforeSend:function(){
        //加载样式
        a = layer.load(0, {shade: false});},

        success: function(data) {
            //关闭加载样式
            layer.close(a)
            //移除微博
            $('#notice'+id).remove();
            layer.msg('公告删除成功!', {icon: 1});
            }, 
        })
    });
}

    </script>
@endsection
s