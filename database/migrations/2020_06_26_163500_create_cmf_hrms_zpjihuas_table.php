<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsZpjihuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_zpjihua', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',255);
            $table->string('sex',255);
            $table->string('need',255);
            $table->integer('personNumber');
            $table->date('startTime');
            $table->date('endTime');
            $table->string('applyMan',255);
            $table->date('applyTime',255);
            $table->string('exMan',255);
            $table->string('exTime',255);
            $table->string('exStatus',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_zpjihua');
    }
}
