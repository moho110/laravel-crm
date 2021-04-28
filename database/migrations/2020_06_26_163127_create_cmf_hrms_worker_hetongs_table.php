<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsWorkerHetongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_worker_hetong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workId',255);
            $table->string('name',255);
            $table->string('inDepartment',255);
            $table->date('signTime');
            $table->date('endTime');
            $table->integer('workedYear');
            $table->string('creator',255);
            $table->string('createTime',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_worker_hetong');
    }
}
