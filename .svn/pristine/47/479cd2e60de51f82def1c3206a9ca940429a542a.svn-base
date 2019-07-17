@extends('layouts.admin')

@section('other_css')
    <style>
        .auth {
            margin-top: 15px;
        }
        .module {
            font-size: 22px;
            font-weight: 400;
            margin: 20px 0 0 0;
        }
        .checkbox-inline {
            margin: 0 15px 0 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="con_top">
                <a class="content_top" href="{{url('admin/admins/groupList')}}">管理组列表</a> ->
                <a class="content_top" href="{{url('admin/admins/groupEdit')}}">编辑</a>
            </p>
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

            <form class="form-horizontal" action="" method="post" autocomplete="off">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-sm-2 control-label"><i class="fa fa-asterisk"></i>组别名称：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" value="{{old('name') ? old('name') : $info['name']}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">状态：</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" checked> 开启
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0"> 关闭
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"><i class="fa fa-asterisk"></i>权限选择：</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkAll" value="1"> 全选
                            </label>
                        </div>
                        <div class="auth">
                            @foreach($list as $k => $v)
                                <p class="module">{{$v->name}}</p>
                                @foreach($v['rule'] as $k1 => $v1)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="rules[]" class="check" value="{{$v1['id']}}" {{in_array($v1['id'], $checked_rule) ? 'checked' : ''}} > {{$v1['name']}}
                                    </label>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-primary">提交</button>
                        <a href="{{url('admin/admin/groupList')}}" class="btn btn-default">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('other_js')
    <script type="text/javascript">
        var checkAll = $('.checkAll');
        var check    = $('.check');

        $(document).ready(function () {
            var num = 0;
            for (i = 0; i < check.length; i++) {
                var check1 = check.eq(i).prop('checked');
                if (check1) {
                    num++;
                }
            }

            if (num == check.length) {
                checkAll.prop('checked', 'checked');
            } else {
                checkAll.prop('checked', '');
            }
        });

        checkAll.click(function () {
            check.attr('checked', this.checked);
        });

        check.click(function () {
            var num = 0;
            for (i = 0; i < check.length; i++) {
                var check1 = check.eq(i).prop('checked');
                if (check1) {
                    num++;
                }
            }

            if (num == check.length) {
                checkAll.prop('checked', 'checked');
            } else {
                checkAll.prop('checked', '');
            }
        })
    </script>
@endsection