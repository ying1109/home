@extends('layouts.admin')

@section('other_css')
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="con_top">
                <a class="content_top" href="{{url('admin/admins/adminList')}}">管理员列表</a>
            </p>

            @if(session('msg'))
                <input type="hidden" id="msg" value="{{session('msg')}}">
            @endif

            <a href="{{url('admin/admins/adminAdd')}}" class="btn btn-info add">添加</a>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>账号</th>
                    <th>用户名</th>
                    <th>邮箱</th>
                    <th>角色</th>
                    <th>创建时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                @foreach ($admin_list as $k)
                    <tr>
                        <td>{{$k->id}}</td>
                        <td>{{$k->account}}</td>
                        <td>{{$k->user_name}}</td>
                        <td>{{$k->email}}</td>
                        <td>{{$k->role}}</td>
                        <td>{{date('Y-m-d H:i:s', $k->create_time)}}</td>
                        <td>{{$k->status}}</td>
                        <td>
                            <a href="#" class="btn btn-success btn-xs">编辑</a>
                            <a href="{{url('admin/admins/adminDel', array($k->id))}}" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="page_list">
                {{$admin_list}}
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

        $(document).ready(function () {
            var msg = $('#msg').val();
            if (msg) {
                layer.msg(msg);
            }
        })
    </script>
@endsection