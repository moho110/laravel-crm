<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfProduct extends Model
{
    public $timestamps = false;
    protected $table = "cmf_product";

    public function CmfSupply() {
    	return $this->belongsToMany('App\Models\CmfSupply');
    }

    public function CmfSupplyproduct() {
    	return $this->belongsToMany('App\Models\CmfSupplyproduct');
    }

    public function CmfBuyplanmainMingxi() {
        return $this->belongsToMany('App\Models\CmfBuyplanmainMingxi');
    }

    public function CmfCommlog() {
        return $this->belongsToMany('App\Models\CmfCommlog');
    }

    public function CmfCompeteproduct() {
        return $this->belongsToMany('App\Models\CmfCompeteproduct');
    }

    public function CmfExchange() {
        return $this->belongsToMany('App\Models\CmfExchange');
    }

    public function CmfFahuodanDetail() {
        return $this->belongsToMany('App\Models\CmfFahuodanDetail');
    }
}
