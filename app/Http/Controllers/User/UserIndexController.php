<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserIndexController extends Controller{

    public function index()
    {
        $hello   = "首页";
        $welcome = "用户中心";

         return view('user/userIndex')
         ->with("hello",$hello)
         ->with("welcome",$welcome);
    }

    public function test() 
    {
        $hello   = "测试方法";
        $welcome = "用户中心";
        
        return view("user/test")
        ->with("hello",$hello)
        ->with("welcome",$welcome);
    }
}

?>