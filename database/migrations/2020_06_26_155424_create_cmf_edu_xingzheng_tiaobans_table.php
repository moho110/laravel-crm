<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengTiaobansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_tiaoban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term',100);
            $table->string('department',255);
            $table->string('person',255);
            $table->date('oriStartTime');
            $table->string('oriStart',10);
            $table->string('newStartTime',10);
            $table->date('newStart');
            $table->integer('exStatus');
            $table->integer('workFlowID');
            $table->string('exMan',100);
            $table->string('exTime',100);
            $table->string('personName',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_tiaoban');
    }
}
