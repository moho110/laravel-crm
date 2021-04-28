<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduSchoolcalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_schoolcalendar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('holiday',255);
            $table->datetime('startTime');
            $table->datetime('endTime');
            $table->string('term');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_schoolcalendar');
    }
}
