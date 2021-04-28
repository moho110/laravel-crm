<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\CmfAccessbank;

class VrmlController extends Controller{

    public function index()
    {
        $hello   = "首页";
        $welcome = "欢迎您到虚拟现实工作室";
        $cmfaccessbank = DB::table('cmf_accessbank')->paginate(10);
         return view('articles/vrml',['cmfaccessbank'=>$cmfaccessbank])
         ->with("hello",$hello)
         ->with("cmfaccessbanks",$cmfaccessbank)
         ->with("welcome",$welcome);
    }

    public function view($id)
    {
        $hello   = "首页";
        $welcome = "欢迎您到虚拟现实工作室";
        $cmfaccessbank = DB::table('cmf_accessbank')
                            ->where("id",$id)
                            ->orderBy("createman")
                            ->first();
         return view('articles/view',['cmfaccessbank'=>$cmfaccessbank])
         ->with("hello",$hello)
         ->with("cmfaccessbanks",$cmfaccessbank)
         ->with("welcome",$welcome);
    }

    public function display()
    {
    	$hello   = "首页";
        $welcome = "欢迎您到虚拟现实工作室";

    	$cmfaccessbank = DB::table('cmf_accessbank as b')
    					->leftJoin('cmf_accessprepays as p','p.id','=','b.id')
    					->select(DB::raw('b.id,p.linkmanid,p.curchuzhi,p.createtime,b.oldjine,b.jine,b.createman'))
    					->paginate(10);
    					//sql = "select b.id,p.linkmanid,p.curchuzhi,p.createtime,b.oldjine,b.jine,b.createman 
    					//from cmf_accessbank as b 
    					//left outer join cmf_accessprepays as p on p.id=b.id"
    	return view('articles/display',['cmfaccessbank'=>$cmfaccessbank])
         ->with("hello",$hello)
         ->with("cmfaccessbanks",$cmfaccessbank)
         ->with("welcome",$welcome);
    }

    public function detail($id)
    {
    	$hello   = "首页";
        $welcome = "欢迎您到虚拟现实工作室";

    	$cmfaccessbank = DB::table('cmf_accessbank as b')
    					->leftJoin('cmf_accessprepays as p','p.id','=','b.id')
    					->select(DB::raw('b.id,p.linkmanid,p.curchuzhi,b.createtime,b.oldjine,b.jine,b.createman'))
    					->where("b.id",$id)
    					->first();
    					//sql = "select b.id,p.linkmanid,p.curchuzhi,p.createtime,b.oldjine,b.jine,b.createman 
    					//from cmf_accessbank as b 
    					//left outer join cmf_accessprepays as p on p.id=b.id"
    	return view('articles/detail',['cmfaccessbank'=>$cmfaccessbank])
         ->with("hello",$hello)
         ->with("cmfaccessbanks",$cmfaccessbank)
         ->with("welcome",$welcome);
    }
}

?>