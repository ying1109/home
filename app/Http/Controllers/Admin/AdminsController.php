<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminsController extends CommonController
{
    // 管理员列表
    public function adminList() {
        $admin_list = Admin::select()->paginate(10);

        return view('admin.admins.adminList', ['admin_list' => $admin_list]);
    }

    // 管理员添加
    public function adminAdd(Request $request) {
        $input = Input::except('_token');

        if ($input) {
            $request->flash();

            $rules = array(
                'account'  => 'required|unique:admin,account',
                'password' => 'required|confirmed',
                'password_confirmation'      => 'required|same:password',
                'phone'    => new Phone(),
            );
            Rule::unique('admin', 'account');
            $mes_name = array(
                'account'   => '账号',
                'password'   => '密码',
                'password_confirmation'   => '再次输入',
            );

            $validator = Validator::make($input, $rules, array(), $mes_name);

            $input['create_time'] = time();
            $input['update_time'] = time();
            $input['status']      = 1;
            $input['password']    = Crypt::encrypt($input['password']);
            if ($validator->passes()) {
                $res = Admin::insert($input);
                if ($res) {
                    return redirect('admin/admins/adminList');
                } else {
                    return back()->with('errors', '添加失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin.admins.adminAdd');
    }

    // 管理员编辑
    public function adminEdit(Request $request) {

    }
    
    // 管理员删除
    public function adminDel($id) {
        $res = Admin::where('id', $id)->delete();
        if ($res) {
            return back()->with('msg', '删除成功！');
        } else {
            return back()->with('msg', '删除失败，请稍后重试！');
        }
    }


}
