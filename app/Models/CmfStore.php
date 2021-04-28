<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmfStore extends Model
{
    public $timestamps = false;
    protected $table = "cmf_store";

    public function CmfExchange() {
        return $this->belongsToMany('App\Models\CmfExchange');
    }
}
