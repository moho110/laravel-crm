<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfStockoutmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_stockoutmain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zhuti',255);
            $table->integer('storeid');
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->string('state',255);
            $table->double('totalnum');
            $table->double('totalmoney');
            $table->integer('dingdanbillid');
            $table->datetime('outdate');
            $table->string('outstoreshenhe',255);
            $table->string('memo',255);
            $table->string('outtype',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_stockoutmain');
    }
}
