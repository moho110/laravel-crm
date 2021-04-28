<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCallchuli extends Model
{
    public $timestamps = false;
    protected $table = "cmf_callchuli";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }

    public function CmfLinkman() {
    	return $this->belongsTo('App\Models\CmfLinkman','id');
    }
}
