<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfExchange extends Model
{
    public $timestamps = false;
    protected $table = "cmf_exchange";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }

    public function CmfProduct() {
    	return $this->belongsTo('App\Models\CmfProduct','id');
    }
    
}
