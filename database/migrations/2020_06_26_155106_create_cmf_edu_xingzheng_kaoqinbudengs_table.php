<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengKaoqinbudengsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_kaoqinbudeng', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term',255);
            $table->string('department',255);
            $table->string('person',255);
            $table->date('time');
            $table->string('day',4);
            $table->date('class',255);
            $table->string('budengProject',255);
            $table->string('budengStatus',8);
            $table->string('workFlowID',30);
            $table->string('exMan',100);
            $table->string('exTime',100);
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
        Schema::dropIfExists('cmf_edu_xingzheng_kaoqinbudeng');
    }
}
