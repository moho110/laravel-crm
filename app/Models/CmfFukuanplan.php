<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfFukuanplan extends Model
{
    public $timestamps = false;
    protected $table = "cmf_fukuanplan";

    public function CmfSupply() {
    	return $this->belongsTo('App\Models\CmfSupply','id');
    }
}
