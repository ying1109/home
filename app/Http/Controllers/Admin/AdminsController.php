<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

// 管理员管理
class AdminsController extends CommonController {
    // 管理员列表
    public function adminList() {
        $map['status'] = 1;
        $admin_list    = Admin::where($map)->select()->paginate(10);
        foreach ($admin_list as $k => $v) {
            if ($v['type'] == 1) {
                $admin_list[$k]['type'] = '开启';
            } else {
                $admin_list[$k]['type'] = '关闭';
            }
        }

        return view('admin.admins.adminList', ['admin_list' => $admin_list]);
    }

    // 管理员添加
    public function adminAdd(Request $request) {
        if (old('type') == null) {
            $a = 'checked';
        } else {
        }

        if ($request->isMethod('POST')) {
            $request->flash();

            $data['account']               = $request->input('account');
            $data['password']              = $request->input('password');
            $data['password_confirmation'] = $request->input('password_confirmation');
            $data['user_name']             = $request->input('user_name');
            $data['real_name']             = $request->input('real_name');
            $data['phone']                 = $request->input('phone');
            $data['update_time']           = time();
            $data['create_time']           = time();
            $data['type']                  = $request->input('type') ? $request->input('type') : 1;

            $rules = array(
                'account'               => 'required|unique:admin,account',
                'password'              => 'required|confirmed',
                'password_confirmation' => 'required|same:password',
                'phone'                 => new Phone(),
            );
            Rule::unique('admin', 'account');

            $mes_name = array(
                'account'               => '账号',
                'password'              => '密码',
                'password_confirmation' => '再次输入',
            );

            $validator = Validator::make($data, $rules, array(), $mes_name);

            $data['password']    = Crypt::encrypt($data['password']);
            $data['status']      = 1;
            unset($data['password_confirmation']);

            if ($validator->passes()) {
                $res = Admin::insertGetId($data);

                if ($res) {
                    return redirect('admin/admins/adminList')->with('success', $res . '添加成功！');
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
    public function adminEdit(Request $request, $id) {
        $info = Admin::where('id', $id)->first();

        if ($request->isMethod('POST')) {
            $request->flash();

            $data['password']              = $request->input('password');
            $data['password_confirmation'] = $request->input('password_confirmation');
            $data['user_name']             = $request->input('user_name');
            $data['real_name']             = $request->input('real_name');
            $data['phone']                 = $request->input('phone');
            $data['update_time']           = time();
            $data['type']                  = $request->input('check');

            $rules = array(
                'password'              => 'required|confirmed',
                'password_confirmation' => 'required|same:password',
                'phone'                 => new Phone(),
            );
            $mes_name = array(
                'password'              => '密码',
                'password_confirmation' => '再次输入',
            );

            $validator = Validator::make($data, $rules, array(), $mes_name);

            $data['password'] = Crypt::encrypt($request->input('password'));
            unset($data['password_confirmation']);

            if ($validator->passes()) {
                $res = Admin::where('id', $id)->update($data);
                if ($res) {
                    return redirect('admin/admins/adminList')->with('success', $id . '修改成功！');
                } else {
                    return back()->with('errors', '编辑失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }
        }

        return view('admin.admins.adminEdit', ['info' => $info]);
    }

    // 管理员删除
    public function adminDel($id) {
        $date['status'] = 0;

        $res = Admin::where('id', $id)->update($date);
        if ($res) {
            return back()->with('success', $id . '删除成功！');
        } else {
            return back()->with('error', $id . '删除失败！');
        }
    }

    // 安全设置
    public function resetPwd(Request $request) {
        if ($request->isMethod('POST')) {
            $map['account'] = $request->input('account');
            $info           = Admin::where($map)->first();

            $data['pwd']                   = $request->input('pwd');
            $data['password']              = $request->input('password');
            $data['password_confirmation'] = $request->input('password_confirmation');

            $rules = array(
                'password'              => 'required|confirmed',
                'password_confirmation' => 'required|same:password',
            );

            $mes_name = array(
                'password'              => '新密码',
                'password_confirmation' => '再次输入',
            );

            $validator = Validator::make($data, $rules, [], $mes_name);

            $data['password'] = Crypt::encrypt($request->input('password'));
            unset($data['pwd']);
            unset($data['password_confirmation']);

            if (Crypt::decrypt($info['password']) != $request->input('pwd')) {
                return back()->with('error', '旧密码输入错误！');
            }

            if ($validator->passes()) {
                $res = Admin::where($map)->update($data);

                if ($res) {
                    return back()->with('success', '密码修改成功！');
                } else {
                    return back()->with('error', '密码修改失败！');
                }
            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin.admins.resetPwd');
    }


}
