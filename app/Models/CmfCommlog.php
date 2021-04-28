<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCommlog extends Model
{
    public $timestamps = false;
    protected $table = "cmf_commlog";

    public function CmfLinkman() {
    	return $this->belongsTo('App\Models\CmfLinkman','id');
    }

    public function CmfProduct() {
    	return $this->belongsTo('App\Models\CmfProduct','id');
    }

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }
}
