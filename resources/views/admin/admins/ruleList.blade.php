@extends('layouts.admin')

@section('other_css')
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="con_top">
                <a class="content_top" href="{{url('admin/admins/authList')}}">管理组列表</a>
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
            <a href="{{url('admin/admins/authAdd')}}" class="btn btn-info add">添加</a>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>所属模块</th>
                    <th>规则名称</th>
                    <th>规则</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                {{--@foreach ($list as $k)--}}
                    <tr>
                        <td>{{$k->id}}</td>
                        <td>{{$k->module}}</td>
                        <td>{{$k->name}}</td>
                        <td>{{$k->url}}</td>
                        <td>{{status($k->status)}}</td>
                        <td>
                            <a href="{{url('admin/admins/ruleEdit', array($k->id))}}" class="btn btn-success btn-xs">编辑</a>
                            <a href="{{url('admin/admins/ruleDel', array($k->id))}}" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                {{--@endforeach--}}
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