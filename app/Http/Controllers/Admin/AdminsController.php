<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use App\Http\Model\AdminGroup;
use App\Http\Model\AdminModule;
use App\Http\Model\AdminRule;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

// 管理员管理
class AdminsController extends CommonController {
    // 管理员列表
    public function adminList () {
        $map['status'] = 1;
        $list          = Admin::where($map)->select()->paginate(10);
        foreach ($list as $k => $v) {
            if ($v['type'] == 1) {
                $list[ $k ]['type'] = '开启';
            } else {
                $list[ $k ]['type'] = '关闭';
            }
        }

        return view('admin.admins.adminList', ['list' => $list]);
    }

    // 管理员添加
    public function adminAdd (Request $request) {
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

            $rules = array ('account'               => 'required|unique:admin,account',
                            'password'              => 'required|confirmed',
                            'password_confirmation' => 'required|same:password',
                            'phone'                 => new Phone(),);
            Rule::unique('admin', 'account');

            $mes_name = array ('account'               => '账号',
                               'password'              => '密码',
                               'password_confirmation' => '再次输入',);

            $validator = Validator::make($data, $rules, array (), $mes_name);

            $data['password'] = Crypt::encrypt($data['password']);
            $data['status']   = 1;
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
    public function adminEdit (Request $request, $id) {
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

            $rules    = array ('password'              => 'required|confirmed',
                               'password_confirmation' => 'required|same:password',
                               'phone'                 => new Phone(),);
            $mes_name = array ('password'              => '密码',
                               'password_confirmation' => '再次输入',);

            $validator = Validator::make($data, $rules, array (), $mes_name);

            $data['password'] = Crypt::encrypt($request->input('password'));
            unset($data['password_confirmation']);

            if ($validator->passes()) {
                $res = Admin::where('id', $id)->update($data);
                if ($res) {
                    return redirect('admin/admins/adminList')->with('success', $id . '编辑成功！');
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
    public function adminDel ($id) {
        $date['status'] = 0;

        $res = Admin::where('id', $id)->update($date);
        if ($res) {
            return back()->with('success', $id . '删除成功！');
        } else {
            return back()->with('error', $id . '删除失败！');
        }
    }

    // 模块管理
    public function moduleList () {
        $map['status'] = 1;

        $list = AdminModule::where($map)->select()->paginate(10);
        foreach ($list as $k => $v) {
            if ($v['pid'] == 0) {
                $list[ $k ]['pid'] = '顶级模块';
            } else {
                foreach ($list as $k1 => $v1) {
                    if ($v['pid'] == $v1['id']) {
                        $list[ $k ]['pid'] = $v1['name'];
                    }
                }
            }
        }

        return view('admin.admins.moduleList', ['list' => $list]);
    }

    // 模块添加
    public function moduleAdd (Request $request) {
        $map['status'] = 1;

        $list = AdminModule::where($map)->get();

        if ($request->isMethod('POST')) {
            $request->flash();

            $data['pid']         = $request->input('pid');
            $data['name']        = $request->input('name');
            $data['create_time'] = time();
            $data['update_time'] = time();

            $rules = array ('pid'  => 'required',
                            'name' => 'required',);

            $mes_name = array ('pid'  => '父级模块',
                               'name' => '模块名称',);

            $validator = Validator::make($data, $rules, array (), $mes_name);
            if ($validator->passes()) {
                $res = AdminModule::insertGetId($data);

                if ($res) {
                    return redirect('admin/admins/moduleList')->with('success', $res . '添加成功！');
                } else {
                    return back()->with('errors', '添加失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin.admins.moduleAdd', ['list' => $list]);
    }

    // 模块编辑
    public function moduleEdit (Request $request, $id) {
        $map['status'] = 1;
        $list          = AdminModule::where($map)->get();

        $info = AdminModule::where('id', $id)->first();

        if ($request->isMethod('POST')) {
            $request->flash();

            $data['pid']         = $request->input('pid');
            $data['name']        = $request->input('name');
            $data['update_time'] = time();

            $rules = array ('pid'  => 'required',
                            'name' => 'required',);

            $mes_name = array ('pid'  => '父级模块',
                               'name' => '模块名称',);

            $validator = Validator::make($data, $rules, array (), $mes_name);
            if ($validator->passes()) {
                $res = AdminModule::where('id', $id)->update($data);

                if ($res) {
                    return redirect('admin/admins/moduleList')->with('success', $res . '编辑成功！');
                } else {
                    return back()->with('errors', '编辑失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin.admins.moduleEdit', ['info' => $info,
                                                'list' => $list,]);
    }

    // 模块删除
    public function moduleDel ($id) {
        $date['status'] = 0;

        $res = AdminModule::where('id', $id)->update($date);
        if ($res) {
            return back()->with('success', $id . '删除成功！');
        } else {
            return back()->with('error', $id . '删除失败！');
        }
    }

    // 规则管理
    public function ruleList () {
        $map['status'] = 1;

        $list = AdminRule::where($map)->select()->paginate(10);
        foreach ($list as $k => $v) {
            $map_module['id'] = $v['module'];
            $info_module = AdminModule::where($map_module)->first();
            $list[ $k ]['module'] = $info_module['name'];
        }

        return view('admin.admins.ruleList', ['list' => $list]);
    }

    // 规则添加
    public function ruleAdd (Request $request) {
        $map['status'] = 1;

        $list = AdminModule::where($map)->get();

        if ($request->isMethod('POST')) {
            $request->flash();

            $data['module']      = $request->input('module');
            $data['url']         = $request->input('url');
            $data['name']        = $request->input('name');
            $data['create_time'] = time();
            $data['update_time'] = time();

            $rules = array (
                'module' => 'required',
                'name'   => 'required',
                'url'    => 'required',
            );

            $mes_name = array (
                'module' => '所属模块',
                'name'   => '规则名称',
                'url'    => '规则',
            );

            $validator = Validator::make($data, $rules, array (), $mes_name);
            if ($validator->passes()) {
                $res = AdminRule::insertGetId($data);

                if ($res) {
                    return redirect('admin/admins/ruleList')->with('success', $res . '添加成功！');
                } else {
                    return back()->with('errors', '添加失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin.admins.ruleAdd', ['list' => $list]);
    }

    // 规则编辑
    public function ruleEdit (Request $request, $id) {
        $map['status'] = 1;
        $list          = AdminRule::where($map)->get();

        $info = AdminRule::where('id', $id)->first();

        if ($request->isMethod('POST')) {
            $request->flash();

            $data['module']      = $request->input('module');
            $data['url']         = $request->input('url');
            $data['name']        = $request->input('name');
            $data['update_time'] = time();

            $rules = array (
                'module' => 'required',
                'name'   => 'required',
                'url'    => 'required',
            );

            $mes_name = array (
                'module' => '所属模块',
                'name'   => '规则名称',
                'url'    => '规则',
            );

            $validator = Validator::make($data, $rules, array (), $mes_name);
            if ($validator->passes()) {
                $res = AdminRule::where('id', $id)->update($data);

                if ($res) {
                    return redirect('admin/admins/ruleList')->with('success', $res . '编辑成功！');
                } else {
                    return back()->with('errors', '编辑失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin.admins.ruleEdit', ['info' => $info, 'list' => $list,]);
    }

    // 规则删除
    public function ruleDel ($id) {
        $date['status'] = 0;

        $res = AdminRule::where('id', $id)->update($date);
        if ($res) {
            return back()->with('success', $id . '删除成功！');
        } else {
            return back()->with('error', $id . '删除失败！');
        }
    }

    // 组别管理
    public function groupList () {
        $map['status'] = array('>', 0);

        $list = AdminGroup::where($map)->select()->paginate(10);
        // foreach ($list as $k => $v) {
        //     $map_module['id'] = $v['module'];
        //     $info_module = AdminModule::where($map_module)->first();
        //     $list[ $k ]['module'] = $info_module['name'];
        // }

        return view('admin.admins.groupList', ['list' => $list]);
    }

    // 组别添加
    public function groupAdd (Request $request) {
        $map['status'] = 1;

        $list = AdminModule::where($map)->get();

        if ($request->isMethod('POST')) {
            $request->flash();

            $data['module']      = $request->input('module');
            $data['url']         = $request->input('url');
            $data['name']        = $request->input('name');
            $data['create_time'] = time();
            $data['update_time'] = time();

            $rules = array (
                'module' => 'required',
                'name'   => 'required',
                'url'    => 'required',
            );

            $mes_name = array (
                'module' => '所属模块',
                'name'   => '规则名称',
                'url'    => '规则',
            );

            $validator = Validator::make($data, $rules, array (), $mes_name);
            if ($validator->passes()) {
                $res = AdminRule::insertGetId($data);

                if ($res) {
                    return redirect('admin/admins/groupList')->with('success', $res . '添加成功！');
                } else {
                    return back()->with('errors', '添加失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin.admins.groupAdd', ['list' => $list]);
    }

    // 组别编辑
    public function groupEdit (Request $request, $id) {
        $map['status'] = 1;
        $list          = AdminRule::where($map)->get();

        $info = AdminRule::where('id', $id)->first();

        if ($request->isMethod('POST')) {
            $request->flash();

            $data['module']      = $request->input('module');
            $data['url']         = $request->input('url');
            $data['name']        = $request->input('name');
            $data['update_time'] = time();

            $rules = array (
                'module' => 'required',
                'name'   => 'required',
                'url'    => 'required',
            );

            $mes_name = array (
                'module' => '所属模块',
                'name'   => '规则名称',
                'url'    => '规则',
            );

            $validator = Validator::make($data, $rules, array (), $mes_name);
            if ($validator->passes()) {
                $res = AdminRule::where('id', $id)->update($data);

                if ($res) {
                    return redirect('admin/admins/groupList')->with('success', $res . '编辑成功！');
                } else {
                    return back()->with('errors', '编辑失败，请稍后重试！');
                }
            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin.admins.groupEdit', ['info' => $info, 'list' => $list,]);
    }

    // 组别删除
    public function groupDel ($id) {
        $date['status'] = 0;

        $res = AdminRule::where('id', $id)->update($date);
        if ($res) {
            return back()->with('success', $id . '删除成功！');
        } else {
            return back()->with('error', $id . '删除失败！');
        }
    }


    // 安全设置
    public function resetPwd (Request $request) {
        if ($request->isMethod('POST')) {
            $map['account'] = $request->input('account');
            $info           = Admin::where($map)->first();

            $data['pwd']                   = $request->input('pwd');
            $data['password']              = $request->input('password');
            $data['password_confirmation'] = $request->input('password_confirmation');

            $rules = array ('password'              => 'required|confirmed',
                            'password_confirmation' => 'required|same:password',);

            $mes_name = array ('password'              => '新密码',
                               'password_confirmation' => '再次输入',);

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
