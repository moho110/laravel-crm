<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfBuyplanmainMingxi extends Model
{
    public $timestamps = false;
    protected $table = "cmf_buyplanmain_mingxi";

    public function CmfProduct() {
    	return $this->belongsTo('App\Models\CmfProduct','id');
    }
}
