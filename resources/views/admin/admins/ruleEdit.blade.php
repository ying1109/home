@extends('layouts.admin')

@section('other_css')
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="con_top">
                <a class="content_top" href="{{url('admin/admins/ruleList')}}">规则列表</a> ->
                <a class="content_top" href="{{url('admin/admins/ruleEdit')}}">编辑</a>
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
                    <label class="col-sm-2 control-label"><i class="fa fa-asterisk"></i>所属模块：</label>
                    <div class="col-sm-4">
                        <select name="module" class="form-control">
                            <option value="">请选择所属模块</option>
                            @foreach($list as $k => $v)
                                <option value="{{$v->id}}" {{$info->module == $v->id ? 'selected' : '' }}>=>{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"><i class="fa fa-asterisk"></i>规则名称：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" value="{{old('name') ? old('name') : $info->name}}" placeholder="控制台">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"><i class="fa fa-asterisk"></i>规则：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="url" value="{{old('url') ? old('url') : $info->url}}" placeholder="admin/homepage/console">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">状态：</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" {{$info->status == 1 ? 'checked' : ''}}> 开启
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" {{$info->status == 0 ? 'checked' : ''}}> 关闭
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-primary">提交</button>
                        <a href="{{url('admin/admin/ruleList')}}" class="btn btn-default">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('other_js')
@endsection