<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengBancisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_banci', function (Blueprint $table) {
            $table->increments('id');
            $table->string('className',30);
            $table->string('dutyTime',30);
            $table->string('isStartTimeEnable',4);
            $table->date('isEndTimeEnable');
            $table->datetime('startCardTime');
            $table->datetime('endCardTime');
            $table->datetime('startDelayCardTime');
            $table->datetime('endDelayCardTime');
            $table->datetime('laterTime');
            $table->datetime('earlyTime');
            $table->string('classManageOne',255);
            $table->string('classManageTwo',255);
            $table->string('memo',255);
            $table->string('creator',50);
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
        Schema::dropIfExists('cmf_edu_xingzheng_banci');
    }
}
