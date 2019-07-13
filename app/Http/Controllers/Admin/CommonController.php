<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommonController extends Controller
{
    public function __construct() {

        $this->middleware(function ($request, $next) {
            dd($request->session()->all());
            return $next($request);
        });


        $this->middleware('admin.login');

        $admin = Session::get('admin');

        // 添加操作日志
        $log_str = 'log_start: ' . MOD_CON_MET . ' --> ' . $admin[ 'account' ] . ' --> ' . date('Y-m-d H:i:s') . "\r";
        $path    = base_path() . '.\public\log.txt';
        file_put_contents($path, $log_str, FILE_APPEND);
        echo "<pre>";
        var_dump($admin);
        var_dump('------------------------');
        die;

    }
}
