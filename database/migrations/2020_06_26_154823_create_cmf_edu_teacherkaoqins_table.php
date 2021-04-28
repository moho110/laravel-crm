<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduTeacherkaoqinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_teacherkaoqin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teacherUserName',255);
            $table->string('teacherName',255);
            $table->date('dutyDate');
            $table->string('cardTime',255);
            $table->string('dutyId',255);
            $table->string('dutyPosition',255);
            $table->string('dutyIP',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_teacherkaoqin');
    }
}
