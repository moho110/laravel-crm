<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfCrmMytable extends Model
{
	protected $guarded = array('Id');
    public $timestamps = false;
    protected $table = "cmf_crm_mytable";
}
