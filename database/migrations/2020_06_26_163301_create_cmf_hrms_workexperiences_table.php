<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsWorkexperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_workexperience', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workId',255);
            $table->string('name',255);
            $table->string('inDepartment',255);
            $table->date('startTime');
            $table->date('endTime');
            $table->string('company',255);
            $table->string('department',255);
            $table->string('staff',20);
            $table->string('proveMan',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->date('createTime');
            $table->string('quitReason',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_workexperience');
    }
}
