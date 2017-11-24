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
            name="select" 
            value="{{isset($_GET['content']) ? $_GET['content'] : '' }}">全部
            </option>

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

            搜索<input 
            aria-controls="DataTables_Table_1" 
            type="text"  
            name="content" 
            value="{{isset($_GET['content']) ? $_GET['content'] : '' }}"/>
            {{ csrf_field()}}

        </label>
        <button class="btn btn-danger">提交</button>
    </div>
    </form>

    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
    <thead>
      <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width:150px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">用户名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 300px;" aria-label="Browser: activate to sort column ascending">微博</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 300px;" aria-label="Platform(s): activate to sort column ascending">评论量</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">转发量</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 166px;" aria-label="CSS grade: activate to sort column ascending">点赞量</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">热门</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 300px;" aria-label="CSS grade: activate to sort column ascending">举报</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 550px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
    </tr>
    </thead>                 
           <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($resd as $k => $v)
                <tr class="odd" align="center">
                    <td class=" ">{{$v->nickName}}</td>
                    <td class=" ">{{$v->content}}</td>
                    <td class=" ">{{$v->rnum}}</td>
                    <td class=" ">{{$v->fnum}}</td>
                    <td class=" ">{{$v->pnum}}</td>
                    <td class=" ">{{$v->hot == 0 ? '否' : '是'}}</td>
                    <td class=" ">{{$v->report == 0 ? '正常' : '被举报'}}</td>
                    <td class=" ">

                     <a href="/admin/weibo/{{$v->cid}}/edit">
                    <button id="status" class="btn btn-danger">
                        {{$v -> hot == 0 ? ' 登上热门 ' : ' 取消热门 ' }}
                    </button>
                    </a> 

                    <form action="/admin/weibo/{{$v->cid}}" method='post'>
                    <button id="delete" class="btn btn-danger">删除微博</button>     
                        </form>
                    </td>
                </tr>
                @endforeach 
            </tbody>
            </table>
            
            <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
            
            <style>
            .pagination li
            {
                background-color: #444444;
                border-left: 1px solid rgba(255, 255, 255, 0.15);
                border-right: 1px solid rgba(0, 0, 0, 0.5);
                box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;     
                cursor: pointer;
                display: block;
                float: left;
                font-size: 12px;
                height: 20px;
                line-height: 20px;
                outline: medium none;
                padding: 0 10px;
                text-align: center;
                text-decoration: none;
            }

            .pagination a
            {
                color: #fff;
            }
            
            .pagination .active{
                background-color: #88a9eb;
                background-image: none;
                border: medium none;
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset;
                color: #323232;
            }

            .pagination .disabled{
                color: #666666;
                cursor: default;
            }

            .pagination
            {
                margin:0px;
            }

            </style>
                 {!! $resd->render() !!}
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

