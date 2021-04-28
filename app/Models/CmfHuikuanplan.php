<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfHuikuanplan extends Model
{
    public $timestamps = false;
    protected $table = "cmf_huikuanplan";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }
}
