<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfLinkman extends Model
{
    public $timestamps = false;
    protected $table = "cmf_linkman";

    public function CmfAccessprepay() {
        return $this->belongsToMany('App\Models\CmfAccessprepay');
    }

    public function CmfCallchuli() {
        return $this->belongsToMany('App\Models\CmfCallchuli');
    }

    public function CmfCommlog() {
        return $this->belongsToMany('App\Models\CmfCommlog');
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
}
