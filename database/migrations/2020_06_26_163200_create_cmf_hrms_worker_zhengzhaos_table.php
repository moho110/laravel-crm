<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsWorkerZhengzhaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_worker_zhengzhao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workId',255);
            $table->string('name',255);
            $table->string('inDepartment',255);
            $table->string('photo',255);
            $table->string('certificationType',255);
            $table->string('certificationName',255);
            $table->string('certificationScan',255);
            $table->date('prizeTime');
            $table->string('agency',255);
            $table->string('creator',255);
            $table->date('createTime',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_worker_zhengzhao');
    }
}
