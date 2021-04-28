<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCrmServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_crm_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serviceId',255);
            $table->string('serviceStage',255);
            $table->datetime('lastLimited');
            $table->string('serviceSummary',255);
            $table->string('clientName',255);
            $table->string('linkMan',255);
            $table->string('seriousDegree',255);
            $table->string('solveMan',255);
            $table->string('solveMethod',255);
            $table->string('solveStatus',255);
            $table->string('isExamine',255);
            $table->string('examineMan',255);
            $table->string('examineTime',255);
            $table->string('note',255);
            $table->string('attach',255);
            $table->string('creator',255);
            $table->datetime('createTime');
            $table->string('relationSaleList');
            $table->string('customTwo');
            $table->string('customThree');
            $table->string('customFour');
            $table->string('customFive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_crm_service');
    }
}
