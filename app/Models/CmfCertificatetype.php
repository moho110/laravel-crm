<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCertificatetype extends Model
{
    public $timestamps = false;
    protected $table = "cmf_certificatetype";

    public function CmfCertificate() {
    	return $this->belongsToMany('App\Models\CmfCertificate');
    }
}
