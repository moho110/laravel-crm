<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;

class TestController extends Controller{

    public function index()
    {
        $hello   = "测试路由";
        $welcome = "测试路由";

         return view('test/index')
         ->with("hello",$hello)
         ->with("welcome",$welcome);
    }
}

?>