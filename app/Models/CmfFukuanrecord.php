<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfFukuanrecord extends Model
{
    public $timestamps = false;
    protected $table = "cmf_fukuanrecord";

    public function CmfSupply() {
    	return $this->belongsTo('App\Models\CmfSupply','id');
    }
}
