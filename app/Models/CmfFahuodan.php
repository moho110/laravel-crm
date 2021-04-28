<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfFahuodan extends Model
{
    public $timestamps = false;
    protected $table = "cmf_fahuodan";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }
}
