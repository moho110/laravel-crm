<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCustomer extends Model
{
    public $timestamps = false;
    protected $table = "cmf_customer";

    public function CmfCustomerarea() {
    	return $this->belongsTo('App\Models\CmfCustomerarea','id');
    }

    public function CmfSupply() {
    	return $this->belongsTo('App\Models\CmfSupply','id');
    }

    public function CmfAccesspreshou() {
    	return $this->belongsToMany('App\Models\CmfAccesspreshou');
    }

    public function CmfCallchuli() {
        return $this->belongsToMany('App\Models\CmfCallchuli');
    }

    public function CmfCommlog() {
        return $this->belongsToMany('App\Models\CmfCommlog');
    }

    public function CmfCompeteproduct() {
        return $this->belongsToMany('App\Models\CmfCompeteproduct');
    }

    public function CmfCrmContact() {
        return $this->belongsToMany('App\Models\CmfCrmContact');
    }

    public function CmfCrmRemember() {
        return $this->belongsToMany('App\Models\CmfCrmRemember');
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

    public function CmfExchange() {
        return $this->belongsToMany('App\Models\CmfExchange');
    }

    public function CmfFahuodan() {
        return $this->belongsToMany('App\Models\CmfFahuodan');
    }

    public function CmfHuikuanplan() {
        return $this->belongsToMany('App\Models\CmfHuikuanplan');
    }

    public function CmfHuikuanrecord() {
        return $this->belongsToMany('App\Models\CmfHuikuanrecord');
    }

    public function CmfKaipiaorecord() {
        return $this->belongsToMany('App\Models\CmfKaipiaorecord');
    }
}
