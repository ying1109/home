<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    // 登录
    public function login() {
        $input = Input::all();
        if ($input) {
            $account = $input['account'];

            $admin = DB::select('select * from admin  WHERE account = ?', [$account]);
            if (!$admin || Crypt::decrypt($admin[0]->password) != $input['pwd']) {
                return back()->with('msg', '用户名或密码错误！');
            }

            session(['admin'=>$admin]);

            $path  = base_path() . '\storage\framework\sessions\session.php';
            $array = var_export($admin[0]->account, true);
            file_put_contents($path, $array);

            return redirect('admin/homepage/console');
        }

        return view('admin.login.login');
    }
    
    // 退出
    public function quit() {
        session(['admin' => null]);

        return redirect('admin/login');
    }
    

}
