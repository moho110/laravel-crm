<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfOfficeproducttiaokusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_officeproducttiaoku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('officeName',255);
            $table->string('officeNo',255);
            $table->string('transferOutWarehouse',255);
            $table->string('transferInWarehouse',255);
            $table->integer('transferQuantity');
            $table->string('staffMan',255);
            $table->string('approvalMan',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->datetime('creatTime');
            $table->float('price');
            $table->integer('quantity');
            $table->float('count');
            $table->integer('isExamine');
            $table->datetime('exTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_officeproducttiaoku');
    }
}
