<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCertificate extends Model
{
    public $timestamps = false;
    protected $table = "cmf_certificate";

    public function CmfCertificatetype() {
    	return $this->belongsTo('App\Models\CmfCertificatetype','id');
    }

    public function CmfSupply() {
    	return $this->belongsTo('App\Models\CmfSupply','id');
    }
}
