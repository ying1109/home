<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\AdminRule;
use App\Http\Model\Log;

class CommonController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            // 添加操作日志
            $admin   = $request->session()->all();

            $info = AdminRule::where('url', MOD_CON_MET)->first();

            $data['url']         = MOD_CON_MET;
            $data['url_name']    = $info['name'];
            $data['account']     = $admin['admin']['account'];
            $data['account_ip']  = $_SERVER['REMOTE_ADDR'];
            $data['create_time'] = date('Y-m-d H:i:s');
            Log::insert($data);

            $log_str = 'log_start: ' . MOD_CON_MET . ' --> ' . $_SERVER['REMOTE_ADDR'] . ' --> ' . $admin['admin']['account'] . ' --> ' . $admin['admin']['user_name'] . ' --> ' . date('Y-m-d H:i:s') . "\r";
            $path    = base_path() . '.\public\log.txt';
            file_put_contents($path, $log_str, FILE_APPEND);

            return $next($request);
        });


    }
}
