<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCompeteproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_competeproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',50);
            $table->string('customerid',100);
            $table->string('productid',100);
            $table->string('infofrom',100);
            $table->string('comproduct',100);
            $table->string('compname',100);
            $table->string('compexcel',255);
            $table->string('compdefect',255);
            $table->string('compprice',100);
            $table->string('user_flag',25);
            $table->string('fileaddress',100);
            $table->datetime('createtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_competeproduct');
    }
}
