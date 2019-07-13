<div id="sidebar">
    <ul class="sidebar_menu">
        <li @if(CONTROLLER == 'homepage') class="treeview treeview-active" @else class="treeview" @endif>
            <a href="#" @if(CONTROLLER == 'homepage') class="active" @endif>
                <i class="fa fa-pagelines fa-fw"></i><span>主页</span>
                <span @if(CONTROLLER == 'homepage') class="angle open" @else class="angle" @endif></span>
            </a>
            <ul class="treeview_menu" @if(CONTROLLER == 'homepage') style="display: block;" @endif>
                <li @if(substr(METHOD, 0, 7) == 'console') class="treeview treeview-active" @else class="treeview" @endif>
                    <a href="{{url('admin/homepage/console')}}" @if(substr(METHOD, 0, 7) == 'console') class="active" @endif>
                        <i class="fa fa-snowflake-o fa-fw"></i>控制台
                    </a>
                </li>
            </ul>
        </li>

        <li @if(CONTROLLER == 'admins') class="treeview treeview-active" @else class="treeview" @endif>
            <a href="#" @if(CONTROLLER == 'admins') class="active" @endif>
                <i class="fa fa-user-o fa-fw"></i><span>管理员管理</span>
                <span @if(CONTROLLER == 'admins') class="angle open" @else class="angle" @endif></span>
            </a>
            <ul class="treeview_menu" @if(CONTROLLER == 'admins') style="display: block;" @endif>
                <li @if(substr(METHOD, 0, 5) == 'admin') class="treeview treeview-active" @else class="treeview" @endif>
                    <a href="{{url('admin/admins/adminList')}}" @if(substr(METHOD, 0, 5) == 'admin') class="active" @endif>
                        <i class="fa fa-heart-o fa-fw"></i>管理员列表
                    </a>
                </li>
                <li @if(substr(METHOD, 0, 8) == 'resetPwd') class="treeview treeview-active" @else class="treeview" @endif>
                    <a href="{{url('admin/admins/resetPwd')}}" @if(substr(METHOD, 0, 8) == 'resetPwd') class="active" @endif>
                        <i class="fa fa-key fa-fw"></i>安全设置
                    </a>
                </li>
                <li class="treeview"><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li class="treeview"><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs fa-fw"></i><span>系统设置</span><span class="angle"></span>
            </a>
            <ul class="treeview_menu">
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>轮播图</a></li>
                <li><a href="#"><i class="fa fa-photo fa-fw"></i>意见反馈</a></li>
            </ul>
        </li>

        {{--系统设置--}}
        <li class="treeview">
            <a class="end-line"></a>
        </li>
    </ul>
</div>