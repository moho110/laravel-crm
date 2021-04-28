<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCrmChance extends Model
{
    public $timestamps = false;
    protected $table = "cmf_crm_chance";

    public function CmfCustomer() {
    	return $this->belongsTo('App\Models\CmfCustomer','id');
    }

    public function CmfCrmShenqingbaobei() {
        return $this->belongsToMany('App\Models\CmfCrmShenqingbaobei');
    }

    public function CmfCustomerFangan() {
        return $this->belongsToMany('App\Models\CmfAccesspreshou');
    }

    public function CmfCustomerXuqiu() {
        return $this->belongsToMany('App\Models\CmfCustomerXuqiu');
    }

}
