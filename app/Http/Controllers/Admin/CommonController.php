<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommonController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            // 添加操作日志
            $admin   = $request->session()->all();
            $log_str = 'log_start: ' . MOD_CON_MET . ' --> ' . $admin['admin']['account'] . ' --> ' . $admin['admin']['user_name'] . ' --> ' . date('Y-m-d H:i:s') . "\r";
            $path    = base_path() . '.\public\log.txt';
            file_put_contents($path, $log_str, FILE_APPEND);

            return $next($request);
        });


    }
}
