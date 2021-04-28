<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengWorkCheckRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_work_check_register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('schoolName',255);
            $table->string('studyYear',255);
            $table->string('name',255);
            $table->string('userName',255);
            $table->string('classRoom',255);
            $table->string('staff',255);
            $table->date('fillDate');
            $table->text('dutyAndYearObj');
            $table->text('personSummary');
            $table->string('personSySign',255);
            $table->date('personSySignDate');
            $table->text('recentYearPunishThings');
            $table->string('classRoomIdeal',255);
            $table->string('rankandLevel',255);
            $table->string('classRoomSign',255);
            $table->date('classRoomDate');
            $table->string('schoolOpinion',255);
            $table->string('ExLeaderGroupSign',255);
            $table->date('ExLeaderGroupSignDate');
            $table->string('personOpinion',255);
            $table->string('personSign',255);
            $table->date('personOpinionDate');
            $table->string('workFlow',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_work_check_register');
    }
}
