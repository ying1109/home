<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct() {
        // $path    = base_path() . '\storage\framework\sessions\session.php';
        // $account = file_get_contents($path);
        // $account = trim($account, '\'');
        //
        // View::share('account', $account);
    }
}
