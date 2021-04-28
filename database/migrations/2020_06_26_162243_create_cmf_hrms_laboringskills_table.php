<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsLaboringskillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_laboringskill', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workId',255);
            $table->string('name',255);
            $table->string('inDepartment',255);
            $table->date('startTime');
            $table->date('endTime');
            $table->string('certifiationUnit');
            $table->string('certificationDep',255);
            $table->string('certificationName',255);
            $table->string('proveMan',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->date('createTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_laboringskill');
    }
}
