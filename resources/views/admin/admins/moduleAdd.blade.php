@extends('layouts.admin')

@section('other_css')
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="con_top">
                <a class="content_top" href="{{url('admin/admins/moduleList')}}">管理员列表</a> ->
                <a class="content_top" href="{{url('admin/admins/moduleAdd')}}">添加</a>
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
                    <label class="col-sm-2 control-label"><i class="fa fa-asterisk"></i>父级模块：</label>
                    <div class="col-sm-4">
                        <select name="pid" class="form-control">
                            <option value="0">顶级模块</option>
                            @foreach($list as $k => $v)
                                <option value="{{$v->id}}" {{old('pid') == $v->id ? 'selected' : '' }}>=>{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"><i class="fa fa-asterisk"></i>模块名称：</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
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
@endsection