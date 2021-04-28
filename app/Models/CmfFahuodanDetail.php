<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfFahuodanDetail extends Model
{
    public $timestamps = false;
    protected $table = "cmf_fahuodan_detail";

    public function CmfProduct() {
    	return $this->belongsTo('App\Models\CmfProduct','id');
    }
}
