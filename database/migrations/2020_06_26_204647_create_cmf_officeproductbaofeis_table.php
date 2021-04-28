<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfOfficeproductbaofeisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_officeproductbaofei', function (Blueprint $table) {
            $table->increments('id');
            $table->string('officeName',255);
            $table->string('officeNo',255);
            $table->string('inWarehouse',255);
            $table->integer('baofeiQuantity');
            $table->string('baofeiApplyMan',255);
            $table->string('dutyMan',255);
            $table->string('approvalMan',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->datetime('creatTime');
            $table->float('price');
            $table->integer('quantity');
            $table->float('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_officeproductbaofei');
    }
}
