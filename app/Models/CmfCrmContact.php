<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCrmContact extends Model
{
    public $timestamps = false;
    protected $table = "cmf_crm_contact";

    public function CmfLinkman() {
    	return $this->belongsTo('App\Models\CmfLinkman','id');
    }

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }
}
