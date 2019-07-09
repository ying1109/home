@extends('layouts.admin')

@section('other_css')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="con_top">管理员列表 -> 添加</p>

            <form class="form-horizontal" action="{{url('admin/admins/adminAdd')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label required">账号：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="account">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required">密码：</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="pwd1" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required">再次输入：</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control"  name="pwd2">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">用户名：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="user_name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">真实姓名：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="real_name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">电话：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="phone">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">邮箱：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">角色：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="role">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-default">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('other_js')
<script type="text/javascript">
    $("form").on("submit", function () {
        var account = $("input[name='account']").val();
        var pwd1    = $("input[name='pwd1']").val();
        var pwd2    = $("input[name='pwd2']").val();
        if (!account || !pwd1 || !pwd2) {
            layer.msg('账号和密码不能为空！');
            return false;
        }
        if (pwd1 != pwd2) {
            layer.msg('两次密码输入不一致，请重新出入！');
            return false;
        }
    })
</script>
@endsection