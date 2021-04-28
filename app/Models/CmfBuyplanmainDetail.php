<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfBuyplanmainDetail extends Model
{
    public $timestamps = false;
    protected $table = "cmf_buyplanmain_detail";

    public function CmfBuyplanmain() {
    	return $this->belongsToMany('App\Models\CmfBuyplanmain');
    }
}
