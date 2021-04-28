<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduZhongcengrenyuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_zhongcengrenyuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('testName',255);
            $table->string('testManBy',255);
            $table->string('uit',255);
            $table->string('staff',255);
            $table->text('pindeDesp');
            $table->text('pindeSelf');
            $table->text('abillityDesp');
            $table->text('abillitySelf');
            $table->text('studyDesp');
            $table->text('studySelf');
            $table->text('jixiaoDesp');
            $table->text('jixiaoSelf');
            $table->text('lianzhengDesp');
            $table->text('lianzhengSelf');
            $table->text('attach');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_zhongcengrenyuan');
    }
}
