<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengTiaobanxianghusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_tiaobanxianghu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term',100);
            $table->string('oriDepartment',200);
            $table->string('oriPerson',200);
            $table->date('oriStartTime');
            $table->string('oriStart',100);
            $table->string('newDepartment',200);
            $table->string('newCruit',200);
            $table->date('newStartTime');
            $table->string('newStart',10);
            $table->integer('exStatus');
            $table->integer('workFlowID');
            $table->string('exMan',100);
            $table->string('exTime',100);
            $table->string('oriPersonName',200);
            $table->string('newPersonName',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_tiaobanxianghu');
    }
}
