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
        // $admin_list = DB::select('select * from admin limit 10');
        $admin_list = Admin::select()->paginate(10);

        return view('admin.admins.adminList', ['admin_list' => $admin_list]);
    }

    // 管理员添加
    public function adminAdd(Request $request) {
        $input = Input::except('_token', 'pwd2');
        if ($input) {
            $request->flash();

            $info = Admin::where('account', $input['account'])->exists();
            if ($info) {
                return back()->with('msg', '账号已存在！');
            }

            $input['create_time'] = time();
            $input['update_time'] = time();
            $input['status']      = 1;
            $input['password']    = Crypt::encrypt($input['password']);

            $res = Admin::insert($input);

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
        $res = Admin::where('id', $id)->delete();
        if ($res) {
            // return redirect('admin/admins/adminList');
            return back()->with('msg', '删除成功！');
        } else {
            return back()->with('msg', '删除失败，请稍后重试！');
        }
    }


}
