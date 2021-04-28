<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('USER_ID',20);
            $table->datetime('CAL_TIME');
            $table->datetime('END_TIME',255);
            $table->string('CAL_TYPE',20);
            $table->smallInteger('CAL_LEVEL');
            $table->longtext('CONTENT');
            $table->string('MANAGER_ID',20);
            $table->string('OVER_STATUS',20);
            $table->smallInteger('ifsms');
            $table->datetime('tixingtime');
            $table->string('url',300);
            $table->integer('guanlianid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_calendar');
    }
}
