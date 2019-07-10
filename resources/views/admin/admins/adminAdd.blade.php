@extends('layouts.admin')

@section('other_css')
    <style>
        .eye:before {
            float: right;
            display: inline-block;
            font-size: 16px;
            font-family: FontAwesome;
            height: auto;
            content: "\f070";
            font-weight: 300;
            text-shadow: none;
            margin-top: -29px;
            margin-right: 10px;
        }
        .eye.open:before {
            float: right;
            display: inline-block;
            font-size: 16px;
            font-family: FontAwesome;
            height: auto;
            content: "\f06e";
            font-weight: 300;
            text-shadow: none;
            margin-top: -29px;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="con_top">
                <a class="content_top" href="{{url('admin/admins/adminList')}}">管理员列表</a> ->
                <a class="content_top" href="{{url('admin/admins/adminAdd')}}">添加</a>
            </p>
            {{--@if(session('msg'))--}}
                {{--<input type="hidden" id="msg" value="{{session('msg')}}">--}}
                {{--<div class="alert alert-warning">--}}
                    {{--{{ session('msg') }}--}}
                {{--</div>--}}
            {{--@endif--}}
            @if(count($errors) > 0)
                @if (is_object($errors))
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $k)
                            <p>{{$k}}</p>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-danger">{{$k}}</div>
                @endif
            @endif

            <form class="form-horizontal" action="{{url('admin/admins/adminAdd')}}" method="post" autocomplete="off">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">账号：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="account" value="{{old('account')}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">密码：</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" autocomplete="new-password">
                        <span class="eye"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">再次输入：</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" autocomplete="new-password">
                        <span class="eye"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">用户名：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="user_name"  value="{{old('user_name')}}" autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">真实姓名：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="real_name"  value="{{old('real_name')}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">电话：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="phone"  value="{{old('phone')}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">角色：</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="role"  value="{{old('role')}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('other_js')
    <script src="https://use.fontawesome.com/9f2ac9fd56.js"></script>
    {{--<script src="{{asset('js/bootstrap-password-toggler.js')}}"></script>--}}
    <script type="text/javascript">
        {{--$("form").on("submit", function () {--}}
            {{--var account  = $("input[name='account']").val();--}}
            {{--var password = $("input[name='password']").val();--}}
            {{--var password_confirmation      = $("input[name='password_confirmation']").val();--}}
            {{--var phone    = $("input[name='phone']").val();--}}
            {{--var email    = $("input[name='email']").val();--}}
            {{--if (!account || !password || !password_confirmation) {--}}
                {{--layer.msg('账号和密码不能为空！');--}}
                {{--return false;--}}
            {{--}--}}
            {{--if (password != password_confirmation) {--}}
                {{--layer.msg('两次密码输入不一致，请重新出入！');--}}
                {{--return false;--}}
            {{--}--}}
            {{--if (phone) {--}}
                {{--if (!phone.match(/^1\d{10}$/)) {--}}
                    {{--layer.msg('手机号格式不正确！');--}}
                    {{--return false;--}}
                {{--}--}}
            {{--}--}}
            {{--if (email) {--}}
                {{--if (!email.match(/^\w+@[a-z0-9]+\.[a-z]{2,4}$/)) {--}}
                    {{--layer.msg('邮箱格式不正确！');--}}
                    {{--return false;--}}
                {{--}--}}
            {{--}--}}

        {{--});--}}

        // 显示或隐藏密码
        $(document).ready(function () {
            $('.eye').click(function () {
                var pwd_class = $(this).attr('class');
                if (pwd_class == 'eye') {
                    $(this).addClass('open');
                    $(this).siblings().attr('type', 'text');
                } else {
                    $(this).removeClass('open');
                    $(this).siblings().attr('type', 'password');
                }

            });

            var msg = $('#msg').val();
            if (msg) {
                layer.msg(msg);
            }
        });
    </script>
@endsection