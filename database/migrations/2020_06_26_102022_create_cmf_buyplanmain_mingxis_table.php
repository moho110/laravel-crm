<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfBuyplanmainMingxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_buyplanmain_mingxi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oldproductid',100);
            $table->string('prodid',100);
            $table->double('lastprice');
            $table->string('prodname',100);
            $table->integer('num');
            $table->integer('price');
            $table->double('jine');
            $table->string('beizhu',255);
            $table->integer('mainrowid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_buyplanmain_mingxi');
    }
}
