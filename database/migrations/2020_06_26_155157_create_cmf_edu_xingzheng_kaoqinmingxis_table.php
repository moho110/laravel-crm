<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengKaoqinmingxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_kaoqinmingxi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term',100);
            $table->string('department',200);
            $table->string('person',30);
            $table->date('date');
            $table->integer('week');
            $table->string('day',4);
            $table->string('class',10);
            $table->string('startRealityCard',30);
            $table->string('startKaoqinStatus',10);
            $table->string('endRealityCard',30);
            $table->string('endKaoqinStatus',30);
            $table->string('startCardBGN',10);
            $table->string('startCardEND',10);
            $table->string('endCartBGN',10);
            $table->string('endCardEND',10);
            $table->string('startDelayTime',10);
            $table->string('delayMinutesNum',10);
            $table->string('delayQuitTime',10);
            $table->string('earlyQuitMinutesNum',10);
            $table->datetime('createTime');
            $table->string('personName',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_kaoqinmingxi');
    }
}
