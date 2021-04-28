<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengJiabanbuxiusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_jiabanbuxiu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term',100);
            $table->string('department',255);
            $table->string('person',255);
            $table->date('delayWorkTime');
            $table->string('delayWorkNum',10);
            $table->date('buxiuTime');
            $table->string('buxiuClass',10);
            $table->integer('delayWorkStatus');
            $table->integer('delayWorkID');
            $table->string('delayWorkMan',100);
            $table->string('delayWorkExTime',100);
            $table->integer('buxiuStatus');
            $table->integer('buxiuFlowId');
            $table->string('buxiuExMan',255);
            $table->string('buxiuExTime',255);
            $table->string('personName',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_jiabanbuxiu');
    }
}
