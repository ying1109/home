<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test() {
        dd($_SERVER);
        $a = 111;

        // return view('layouts.admin');
    }



}
