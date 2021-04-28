<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfSellplanmain extends Model
{
    public $timestamps = false;
    protected $table = "cmf_sellplanmain";

    public function CmfSellplanmainDetail() {
    	return $this->belongsTo('App\Models\CmfSellplanmainDetail','id');
    }

}
