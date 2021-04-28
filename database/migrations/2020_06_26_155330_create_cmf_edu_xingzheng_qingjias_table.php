<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengQingjiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_qingjia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term',100);
            $table->string('department',100);
            $table->string('person',20);
            $table->date('time');
            $table->integer('week');
            $table->string('class',100);
            $table->string('qingjiaType',200);
            $table->integer('exStatus');
            $table->integer('workFlowID');
            $table->string('exMan',100);
            $table->string('exTime',100);
            $table->string('personName',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_qingjia');
    }
}
