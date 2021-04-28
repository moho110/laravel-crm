<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfSupplylinkman extends Model
{
    public $timestamps = false;
    protected $table = "cmf_supplylinkman";

    public function CmfSupply() {
    	return $this->belongsToMany('App\Models\CmfSupply');
    }
}
