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
                <a class="content_top" href="{{url('admin/admin/resetPwd')}}">安全设置</a>
            </p>
           
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{session('success')}}</p>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    <p>{{session('error')}}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="form-horizontal" action="" method="post" autocomplete="off">
                {{csrf_field()}}

                <input type="hidden" name="account" value="{{session('admin')['account']}}">

                <div class="form-group">
                    <label class="col-sm-2 control-label">旧密码：</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="pwd" value="" autocomplete="new-password">
                        <span class="eye"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">新密码：</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" value="" autocomplete="new-password">
                        <span class="eye"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">再次输入：</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password_confirmation" value="" autocomplete="new-password">
                        <span class="eye"></span>
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
    <script type="text/javascript">
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