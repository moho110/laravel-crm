<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;

class VideoIndexController extends Controller{

    public function index()
    {
        $hello   = "首页";
        $welcome = "视频页面";

         return view('video/videoIndex')
         ->with("hello",$hello)
         ->with("welcome",$welcome);
    }

    public function test() 
    {
        $hello   = "测试方法";
        $welcome = "视频页面";
        
        return view("video/test")
        ->with("hello",$hello)
        ->with("welcome",$welcome);
    }
}

?>