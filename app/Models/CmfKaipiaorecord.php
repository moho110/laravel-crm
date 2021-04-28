<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfKaipiaorecord extends Model
{
    public $timestamps = false;
    protected $table = "cmf_kaipiaorecord";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }
}
