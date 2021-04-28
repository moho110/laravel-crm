<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfWorkplanmainDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_workplanmain_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mainrowid');
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->datetime('begintime');
            $table->datetime('endtime');
            $table->string('content',255);
            $table->smallInteger('result');
            $table->datetime('nexttime');
            $table->string('nextcontent',255);
            $table->string('fujian',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_workplanmain_detail');
    }
}
