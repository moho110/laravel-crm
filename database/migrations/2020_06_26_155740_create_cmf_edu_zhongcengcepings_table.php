<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduZhongcengcepingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_zhongcengceping', function (Blueprint $table) {
            $table->increments('id');
            $table->string('testName',255);
            $table->string('startTime',255);
            $table->string('endTime',255);
            $table->integer('isUse');
            $table->text('testManby');
            $table->text('joinTestMan');
            $table->string('creator',255);
            $table->datetime('createTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_zhongcengceping');
    }
}
