<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller {
    // 登录
    public function login (Request $request) {
        $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];

        $input = Input::all();
        if ($input) {
            $account = $input['account'];

            $admin = Admin::where('account', $account)->first();
            if ($admin) {
            	if (Crypt::decrypt($admin['password']) != $input['pwd']) {
                    return back()->with('msg', '用户名或密码错误！');
            	}

            	if ($admin['status'] == 0) {
                    return back()->with('msg', '该账号被禁用，如有疑问联系管理员！');
            	}

            	$data['login_time'] = time();
                $data['login_ip']   = $_SERVER['REMOTE_ADDR'];
                Admin::where('account', $account)->update($data);

                session([ 'admin' => $admin ]);
                session()->save();

                return redirect('admin/homepage/console');
            } else {
                return back()->with('msg', $input['account'] . '账号不存在！');
            }
        }

        return view('admin.login.login', ['REMOTE_ADDR'=>$REMOTE_ADDR]);
    }

    // 退出
    public function quit () {
        session([ 'admin' => null ]);

        return redirect('admin/login');
    }


}
