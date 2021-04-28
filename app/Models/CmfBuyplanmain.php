<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfBuyplanmain extends Model
{
    public $timestamps = false;
    protected $table = "cmf_buyplanmain";

    public function CmfBuyplanmainDetail() {
    	return $this->belongsTo('App\Models\CmfBuyplanmainDetail','id');
    }
}
