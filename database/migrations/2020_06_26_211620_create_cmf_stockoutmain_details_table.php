<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfStockoutmainDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_stockoutmain_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prodid',255);
            $table->string('prodname',255);
            $table->string('prodguige',255);
            $table->string('prodxinghao',255);
            $table->string('proddanwei',255);
            $table->float('price');
            $table->float('zhekou');
            $table->double('num');
            $table->string('beizhu',255);
            $table->integer('mainrowid');
            $table->double('jine');
            $table->double('avgprice');
            $table->double('lirun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_stockoutmain_detail');
    }
}
