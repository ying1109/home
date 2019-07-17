@extends('layouts.admin')

@section('other_css')
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="con_top">
                <a class="content_top" href="{{url('admin/admins/moduleList')}}">模块列表</a>
            </p>

            @if(session('success'))
                <div class="alert alert-success">
                    <p>{{session('success')}}</p>
                </div>
            @elseif(session('error'))
                <div class="alert alert-error">
                    <p>{{session('error')}}</p>
                </div>
            @endif
            <a href="{{url('admin/admins/moduleAdd')}}" class="btn btn-info add">添加</a>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>父级模块</th>
                    <th>模块名称</th>
                    <th>操作</th>
                </tr>
                @foreach ($list as $k)
                    <tr>
                        <td>{{$k->id}}</td>
                        <td>{{$k->pid}}</td>
                        <td>{{$k->name}}</td>
                        <td>
                            <a href="{{url('admin/admins/moduleEdit', array($k->id))}}" class="btn btn-success btn-xs">编辑</a>
                            <a href="{{url('admin/admins/moduleDel', array($k->id))}}" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="page_list">
                {{$list}}
            </div>
        </div>
    </div>
@endsection

@section('other_js')
    <script type="text/javascript">
        $(".btn-danger").click(function () {
            var org = confirm('确定删除吗？');
            return org;
        });
    </script>
@endsection