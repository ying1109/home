<div id="header">
    <div id="left">
        <span id="title">后台管理</span>
    </div>
    <a href="#"><i id="top_icon" class="fa fa-align-justify fa-2x"></i></a>
    <div id="right">
        <ul>
            <li><span>{{session('admin')['account']}}</span></li>
            <li>
                <a href="{{url('admin/quit')}}">
                    <i class="fa fa-power-off fa-lg"></i>
                    <span>退出</span>
                </a>
            </li>
        </ul>
    </div>
</div>