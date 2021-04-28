<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfStockchangemainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_stockchangemain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zhuti',255);
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->integer('outstoreid');
            $table->integer('instoreid');
            $table->string('state',255);
            $table->string('outstoreshenhe',255);
            $table->string('instoreshenhe',255);
            $table->datetime('outshenhetime');
            $table->datetime('inshenhetime');
            $table->string('memo',255);
            $table->double('totalmoney');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_stockchangemain');
    }
}
