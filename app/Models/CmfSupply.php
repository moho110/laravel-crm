<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfSupply extends Model
{
    public $timestamps = false;
    protected $table = "cmf_supply";

    public function CmfSupplylinkman() {
    	return $this->belongsTo('App\Models\CmfSupplylinkman','id');
    }

    public function CmfCustomer() {
        return $this->belongsToMany('App\Models\CmfCustomer');
    }

    public function CmfCertificate() {
    	return $this->belongsToMany('App\Models\CmfCertificate');
    }

    public function CmfSupplyproduct() {
    	return $this->belongsToMany('App\Models\CmfSupplyproduct');
    }

    public function CmfAccessprepay() {
        return $this->belongsToMany('App\Models\CmfAccessprepay');
    }

    public function CmfFukuanplan() {
        return $this->belongsToMany('App\Models\CmfFukuanplan');
    }

    public function CmfFukuanrecord() {
        return $this->belongsToMany('App\Models\CmfFukuanrecord');
    }
}
