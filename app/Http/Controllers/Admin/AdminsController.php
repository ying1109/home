<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminsController extends CommonController
{
    // 管理员列表
    public function adminList() {
        $admin_list = DB::select('select * from admin');

        return view('admin.admins.adminList', ['admin_list' => $admin_list]);
    }

    // 管理员添加
    public function adminAdd() {
        $input = Input::except('_token');
        if ($input) {
            $input['create_time'] = time();
            $input['update_time'] = time();
            $input['status']      = 1;

            $res = Admin::create($input);
            if ($res) {
                return redirect('admin/admins/adminList');
            } else {
                return back()->with('errors', '添加失败，请稍后重试！');
            }
        }

        return view('admin.admins.adminAdd');
    }

    // 管理员删除
    public function adminDel($id) {

        var_dump($id);
        die;
    }


}
