<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfHuikuanrecord extends Model
{
    public $timestamps = false;
    protected $table = "cmf_huikuanrecord";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }
}
