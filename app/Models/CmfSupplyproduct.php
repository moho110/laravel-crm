<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfSupplyproduct extends Model
{
    public $timestamps = false;
    protected $table = "cmf_supplyproduct";

    public function CmfSupply() {
    	return $this->belongsTo('App\Models\CmfSupply','id');
    }

    public function CmfProduct() {
    	return $this->belongsTo('App\Models\CmfProduct','id');
    }
}
