<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;

class NewsController extends Controller{

    public function index()
    {
        $hello   = "首页";
        $welcome = "新闻页面";
        $cmfaccessbank = DB::table('cmf_accessbank')
        ->select('id','createman','createtime')->get();

         return view('news/news',['bank'=>$cmfaccessbank])
         ->with("hello",$hello)
         ->with("cmfaccessbank",$cmfaccessbank)
         ->with("welcome",$welcome);
    }

}

?>