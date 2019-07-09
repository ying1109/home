<div id="sidebar">
    <ul class="sidebar_menu">
        <li @if(str_contains($_SERVER['REDIRECT_URL'], '/homepage/')) class="treeview active" @else class="treeview" @endif>
            <a href="#" @if(str_contains($_SERVER['REDIRECT_URL'], '/homepage/')) class="active" @endif>
                <i class="fa fa-pagelines fa-fw"></i><span>主页</span>
                <span @if(str_contains($_SERVER['REDIRECT_URL'], '/homepage/')) class="angle open" @else class="angle" @endif></span>
            </a>
            <ul class="treeview_menu" @if(str_contains($_SERVER['REDIRECT_URL'], '/console')) style="display: block;" @endif>
                <li @if(str_contains($_SERVER['REDIRECT_URL'], '/console')) class="treeview active" @else class="treeview" @endif>
                    <a href="{{url('admin/homepage/console')}}" @if(str_contains($_SERVER['REDIRECT_URL'], '/console')) class="active" @endif>
                        <i class="fa fa-snowflake-o fa-fw"></i>控制台
                    </a>
                </li>
            </ul>
        </li>

        <li @if(str_contains($_SERVER['REDIRECT_URL'], '/admins')) class="treeview active" @else class="treeview" @endif>
            <a href="#" @if(str_contains($_SERVER['REDIRECT_URL'], '/admins')) class="active" @endif>
                <i class="fa fa-user-o fa-fw"></i><span>管理员管理</span>
                <span @if(str_contains($_SERVER['REDIRECT_URL'], '/admins')) class="angle open" @else class="angle" @endif></span>
            </a>
            <ul class="treeview_menu" @if(str_contains($_SERVER['REDIRECT_URL'], '/adminList')) style="display: block;" @endif>
                <li @if(str_contains($_SERVER['REDIRECT_URL'], '/adminList')) class="treeview active" @else class="treeview" @endif>
                    <a href="{{url('admin/admins/adminList')}}" @if(str_contains($_SERVER['REDIRECT_URL'], '/adminList')) class="active" @endif>
                        <i class="fa fa-heart fa-fw" style="color: red;"></i>管理员列表
                    </a>
                </li>
            </ul>
        </li>

        {{--用户管理--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user-o fa-fw"></i><span>用户管理</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="{{url('user/user/myAuth')}}"><i class="fa fa-photo fa-fw"></i>我的权限</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>
    </ul>
</div>