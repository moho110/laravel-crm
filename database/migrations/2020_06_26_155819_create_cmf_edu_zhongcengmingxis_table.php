<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduZhongcengmingxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_zhongcengmingxi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('testName',255);
            $table->string('testManBy',255);
            $table->string('uit',255);
            $table->string('staff',255);
            $table->string('pindeEvl',255);
            $table->string('pindeMemo',255);
            $table->string('abillityPingjia',255);
            $table->string('abillityMemo',255);
            $table->string('studyPingjia',255);
            $table->string('studyMemo',255);
            $table->string('jixiaoPingjia',255);
            $table->string('jixiaoMemo',255);
            $table->string('lianzhengPingjia',255);
            $table->string('lianzhengMemo',255);
            $table->string('PingjiaMan',255);
            $table->string('pingjiaTime',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_zhongcengmingxi');
    }
}
