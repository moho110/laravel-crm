<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCustomerXuqiu extends Model
{
    public $timestamps = false;
    protected $table = "cmf_customer_xuqiu";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }

    public function CmfCrmChance() {
    	return $this->belongsTo('App\Models\CmfCrmChance','id');
    }
}
