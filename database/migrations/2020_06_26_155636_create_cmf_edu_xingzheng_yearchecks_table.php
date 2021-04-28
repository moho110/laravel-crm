<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengYearchecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_yearcheck', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term',100);
            $table->string('userName',100);
            $table->string('name',100);
            $table->string('classRoom',100);
            $table->string('kezhang',100);
            $table->float('pindetaiduAbillityScore');
            $table->float('chuqinScore');
            $table->float('workquantityScore');
            $table->float('workjilvScore');
            $table->float('workSpecScore');
            $table->float('workxiaoguoScore');
            $table->float('banzhurenScore');
            $table->float('tempWorkScore');
            $table->float('thesisScore');
            $table->float('teachingScore');
            $table->float('sumScore');
            $table->date('exTime');
            $table->float('pindeAbillityScore');
            $table->float('chuqinbiaoxianScore');
            $table->float('workExScore');
            $table->float('workJilvExScore');
            $table->float('workSpecExScore');
            $table->float('workxiaoguoExScore');
            $table->float('banzhurenWorkExScore');
            $table->float('tempWorkExScore');
            $table->float('thesisExScore');
            $table->float('techingExScore');
            $table->float('sumExScore');
            $table->string('keshiScoreMan',100);
            $table->date('classRoomScoreTime');
            $table->string('workflow',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_yearcheck');
    }
}
