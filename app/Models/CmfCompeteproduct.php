<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCompeteproduct extends Model
{
    public $timestamps = false;
    protected $table = "cmf_competeproduct";

    public function CmfProduct() {
    	return $this->belongsTo('App\Models\CmfProduct','id');
    }

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }
}
