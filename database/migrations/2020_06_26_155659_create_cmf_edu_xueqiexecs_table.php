<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXueqiexecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xueqiexec', function (Blueprint $table) {
            $table->increments('id');
            $table->string('termName',30);
            $table->integer('recentTerm');
            $table->integer('isMorningHaveClass');
            $table->integer('isEveningHaveClass');
            $table->string('studyYear',20);
            $table->integer('isSatClass');
            $table->integer('isSunClass');
            $table->date('startTime');
            $table->date('endTime');
            $table->string('memo',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xueqiexec');
    }
}
