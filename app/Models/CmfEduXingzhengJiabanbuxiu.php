<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfEduXingzhengJiabanbuxiu extends Model
{
    public $timestamps = false;
    protected $table = "cmf_edu_xingzheng_jiabanbuxiu";

    public function CmfDepartment() {
    	return $this->belongsTo('App\Models\CmfDepartment','id');
    }
}
