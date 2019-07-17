<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="{{asset('admin/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bootstrap-3.3.7-dist/css/bootstrap.css')}}">
</head>
<body>
    <img class="bg_banner" src="{{asset('admin/images/login/1.jpg')}}" alt="">
    <input type="hidden" name="REMOTE_ADDR" value="{{$REMOTE_ADDR}}">
    <div class="login">
        <form class="form-inline" action="" method="post">
            {{csrf_field()}}
            <h1>后台管理</h1>
            @if(session('msg'))
                <p style="color:red">{{session('msg')}}</p>
            @endif
            <div class="form-group">
                <label>账号：</label>
                <input type="text" class="form-control" name="account" placeholder="账号">
            </div>
            <div class="form-group">
                <label>密码：</label>
                <input type="password" class="form-control" name="pwd" placeholder="密码">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info" value="提交">
            </div>
        </form>
    </div>
</body>

<script src="{{asset('admin/js/jquery-3.3.1.js')}}"></script>
<script src="{{asset('admin/bootstrap-3.3.7-dist/js/bootstrap.js')}}"></script>
<script type="text/javascript">
    $(function() {
        setInterval("bgBanner()", 5000);
    })
    var REMOTE_ADDR = $("input[name='REMOTE_ADDR']").val();
    var i = 1;
    function bgBanner() {
        i++;
        $('.bg_banner').attr('src', 'http://' + REMOTE_ADDR + "/admin/images/login/" + i + ".jpg");
        if (i == 7) {
            i = 0;
        }
    }
</script>
</html>