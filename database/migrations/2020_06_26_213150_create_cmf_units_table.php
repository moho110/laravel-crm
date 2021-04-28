<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_unit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UNIT_NAME',255);
            $table->string('TEL_NO',255);
            $table->string('FAX_NO',255);
            $table->string('POST_NO',255);
            $table->string('ADDRESS',255);
            $table->string('URL',255);
            $table->string('EMAIL',255);
            $table->string('BANK_NAME',255);
            $table->string('BANK_NO',255);
            $table->float('numzero');
            $table->integer('buybillid');
            $table->integer('sellbillid');
            $table->integer('stockinbillid');
            $table->integer('stockoutbillid');
            $table->integer('storecheckbillid');
            $table->integer('stockchangebillid');
            $table->integer('zuzhuangbillid');
            $table->integer('feiyongbillid');
            $table->integer('prepaybillid');
            $table->integer('preshoubillid');
            $table->string('dingjiagongshi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_unit');
    }
}
