@extends('admins/layout/admin')

@section('title','微博列表')

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
        <span><i class="icon-table"></i>微博列表</span>
    </div>
    <div class="mws-panel-body no-padding">
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

    <form action='/admin/weibo' method='get'>
     <div id="DataTables_Table_0_length" class="dataTables_length">
        <label>
        <select aria-controls="DataTables_Table_0" name="select">
            <option
            name="select" value="">全部</option>

            @foreach($resa as $k => $v)

            <option
            name="select"
            value="{{isset($_GET['id']) ? $_GET['id'] : $v->id }}">
            {{$v->lcontent}}
            </option>

            @endforeach
        </select>
        </label>
     </div>
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
        <label>

            搜索<input aria-controls="DataTables_Table_1" type="text" name="content" value="{{isset($_GET['content']) ? $_GET['content'] : '' }}"/>
            {{ csrf_field()}}

        </label>
        <button class="btn btn-default">搜索</button>
    </div>
    </form>

    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
    <thead>
      <tr role="row">
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width:150px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">用户名</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 500px;" aria-label="Browser: activate to sort column ascending">微博内容</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 300px;" aria-label="Browser: activate to sort column ascending">发布时间</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">评论量</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">转发量</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">点赞量</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">热门</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">举报次数</th>
        <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 300px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
    </tr>
    </thead>
           <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($resd as $k => $v)
                <tr class="even" align="center" id="wei{{$v->cid}}">
                <td class="">{{$v->nickName}}</td>
                <td class="">{{$v->content}}</td>
                <td class="">{{date('Y-m-d H:i:s',$v->time)}}</td>
                <td class="">{{$v->rnum}}</td>
                <td class="">{{$v->fnum}}</td>
                <td class="">{{$v->pnum}}</td>
                <td id="{{$v->cid}}">{{$v->hot == 0 ? '否' : '是'}}</td>
                <td class="">{{$v->report}}</td>
                <td class="">
                    <button id="status{{$v->cid}}" onclick="fun({{$v->cid}})" class="btn btn-default">
                         {{$v -> hot == 0 ? ' 登上热门 ' : ' 取消热门 ' }}
                    </button>
                    </a>
                    <button onclick="shan({{$v->cid}})" class="btn btn-default" >删除微博</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                {!! $resd->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">$('.mws-form-message').delay(3000).slideUp(1000);</script>
    <script type="text/javascript">

        //微博热门状态修改
       function fun(cid)
       {
        $.ajax({
            url:'/admin/weibo/'+cid+'/edit',
            type:'GET',
            data:'',
            success:function(data){
                if(data['hot'] == 1){
                    document.getElementById('status'+cid).innerHTML="取消热门";
                    document.getElementById(cid).innerHTML="是";
                    layer.msg('登上热门');
                }else{
                    document.getElementById('status'+cid).innerHTML="登上热门";
                    document.getElementById(cid).innerHTML="否";
                    layer.msg('取消热门');
                    }
                }
            }
        );
    };

    //微博删除
   function shan(cid){

    //获取要删除微博的id
    layer.confirm('您确定要删除此微博吗？', {
      btn: ['确定','取消'] //按钮
        }, 
        function(){
        $.ajax({
        type: "post",
        url: '/admin/weibo/'+cid,
        data: {cid:cid,_token:'{{csrf_token()}}',_method:'delete'},

        beforeSend:function(){
        //加载样式
        a = layer.load(0, {shade: false});},

        success: function(data) {
 
            //关闭加载样式
            layer.close(a)
            
            //移除微博
            $('#wei'+cid).remove();

            layer.msg('微博删除成功!', {icon: 1});
            },
        })
    });      
}

</script>
@endsection
