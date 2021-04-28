<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfOfficeproductoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_officeproductout', function (Blueprint $table) {
            $table->increments('id');
            $table->string('officeName',255);
            $table->string('officeNo',255);
            $table->string('outWarehouse',255);
            $table->integer('outQuantity');
            $table->string('applyMan',255);
            $table->string('outStatus',255);
            $table->string('isExamine');
            $table->string('approvalMan',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->datetime('createTime');
            $table->float('price');
            $table->integer('quantity');
            $table->float('count');
            $table->string('returnLimited',20);
            $table->integer('isReturn');
            $table->string('returnReiceiver',200);
            $table->datetime('realReturnDate');
            $table->datetime('examineTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_officeproductout');
    }
}
