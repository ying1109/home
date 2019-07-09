<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends CommonController
{
    public function console() {
        // echo "<pre>";
        // var_dump(MOD_CON_MET);
        // die;

        return view('admin.homepage.console');
    }
    
    
}
