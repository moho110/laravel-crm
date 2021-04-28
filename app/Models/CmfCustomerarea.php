<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCustomerarea extends Model
{
    public $timestamps = false;
    protected $table = "cmf_customerarea";

    public function CmfCustomer() {
    	return $this->belongsToMany('App\Models\CmfCustomer');
    }
}
