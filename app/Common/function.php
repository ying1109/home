<?php
// 自定义公共方法

// 自定义错误信息
function mes_required($str) {
    return $str . '为必填项';
}

function mes_confirmed () {
    return '两次输入密码不匹配';
}
function mes_email ($str) {
    return $str . '格式不正确';
}

