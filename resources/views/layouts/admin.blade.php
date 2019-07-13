<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link href="{{asset('admin/css/index.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/bootstrap-3.3.7-dist/css/bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet"/>
    @section('other_css')
    @show

    <script type="text/javascript">
        window.onload = function () {
            function getHeight() {
                var bodyHeight                                  = window.innerHeight;
                document.querySelector('#sidebar').style.height = (bodyHeight - 60 - 5) + 'px';
            }

            getHeight();
        }
    </script>
</head>
<body>

@include('layouts.header')
@include('layouts.sidebar')
{{--<div class="content">我是首页的内容</div>--}}
<div id="content">
    {{--@include('layouts.contentHeader')--}}

    <section class="content">
        @section('content')
        @show
    </section>
    {{--<h1>我是内容</h1>--}}
</div>

</body>

<script src="{{asset('admin/js/jquery-3.3.1.js')}}"></script>
<script src="{{asset('admin/bootstrap-3.3.7-dist/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/layer/layer.js')}}"></script>
<script src="{{asset('admin/js/index.js')}}"></script>

@section('other_js')
@show
</html>