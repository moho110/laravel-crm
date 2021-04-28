<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfDepartment extends Model
{
    public $timestamps = false;
    protected $table = "cmf_department";

    public function CmfAccesspreshou() {
    	return $this->belongsToMany('App\Models\CmfAccesspreshou');
    }

    public function CmfEduXingzhengJiabanbuxiu() {
    	return $this->belongsToMany('App\Models\CmfEduXingzhengJiabanbuxiu');
    }
}
