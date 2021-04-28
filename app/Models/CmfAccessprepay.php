<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfAccessprepay extends Model
{
    public $timestamps = false;
    protected $table = "cmf_accessprepays";

    public function CmfSupply() {
    	return $this->belongsTo('App\Models\CmfSupply','id');
    }

    public function CmfLinkman() {
    	return $this->belongsTo('App\Models\CmfLinkman','id');
    }
}
