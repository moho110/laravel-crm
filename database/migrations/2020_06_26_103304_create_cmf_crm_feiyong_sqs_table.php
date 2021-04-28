<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCrmFeiyongSqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_crm_feiyong_sq', function (Blueprint $table) {
            $table->increments('id');
            $table->string('feeType',255);
            $table->string('count',255);
            $table->text('feeUse');
            $table->date('applyDate');
            $table->integer('clientName');
            $table->string('reimburseMan',255);
            $table->string('recorder',255);
            $table->smallInteger('isExamine');
            $table->string('examineDate',20);
            $table->string('cashier',255);
            $table->datetime('payTime');
            $table->text('bak');
            $table->string('examineMan',255);
            $table->datetime('createTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_crm_feiyong_sq');
    }
}
