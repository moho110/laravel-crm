<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfSellplanmainDetail extends Model
{
    public $timestamps = false;
    protected $table = "cmf_sellplanmain_detail";
    
    public function CmfSellplanmain() {
    	return $this->belongsToMany('App\Models\CmfSellplanmain');
    }
}
