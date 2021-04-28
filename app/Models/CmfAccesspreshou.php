<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfAccesspreshou extends Model
{
    public $timestamps = false;
    protected $table = "cmf_accesspreshou";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }

    public function CmfDepartment() {
    	return $this->belongsTo('App\Models\CmfDepartment','id');
    }
}
