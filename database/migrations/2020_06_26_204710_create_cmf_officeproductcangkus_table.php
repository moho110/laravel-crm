<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfOfficeproductcangkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_officeproductcangku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('warehouseName',255);
            $table->string('warehouseMan',255);
            $table->string('telphone',255);
            $table->string('warehouseAddress',255);
            $table->string('memo',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_officeproductcangku');
    }
}
