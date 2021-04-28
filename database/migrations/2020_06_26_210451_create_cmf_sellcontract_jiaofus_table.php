<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSellcontractJiaofusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_sellcontract_jiaofu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customerid',255);
            $table->string('hetongid',255);
            $table->string('productid',255);
            $table->integer('planid');
            $table->integer('num');
            $table->float('price');
            $table->string('jieshouren',255);
            $table->date('jiaofudate');
            $table->string('beizhu',255);
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->string('beiyong1',255);
            $table->string('beiyong2',255);
            $table->string('beiyong3',255);
            $table->float('jine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_sellcontract_jiaofu');
    }
}
