<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfStockinmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_stockinmain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zhuti',255);
            $table->integer('storeid');
            $table->datetime('indate');
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->integer('caigoubillid');
            $table->integer('tuihuobillid');
            $table->string('memo',255);
            $table->string('state',255);
            $table->string('beiyong1',255);
            $table->string('beiyong2',255);
            $table->string('beiyong3',255);
            $table->double('totalnum');
            $table->double('totalmoney');
            $table->string('instoreshenhe',255);
            $table->string('intype',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_stockinmain');
    }
}
