<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCrmRemember extends Model
{
    public $timestamps = false;
    protected $table = "cmf_crm_remember";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }

    public function CmfLinkman() {
    	return $this->belongsTo('App\Models\CmfLinkman','id');
    }
}
