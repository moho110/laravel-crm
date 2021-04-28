<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCrmShenqingbaobei extends Model
{
    public $timestamps = false;
    protected $table = "cmf_crm_shenqingbaobei";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }

    public function CmfLinkman() {
    	return $this->belongsTo('App\Models\CmfLinkman','id');
    }

    public function CmfCrmChance() {
    	return $this->belongsTo('App\Models\CmfCrmChance','id');
    }

}
