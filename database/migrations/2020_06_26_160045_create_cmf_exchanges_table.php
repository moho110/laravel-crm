<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_exchange', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customid');
            $table->string('prodid',100);
            $table->string('xinghao',100);
            $table->string('guige',100);
            $table->integer('integral');
            $table->datetime('createtime');
            $table->string('createman',100);
            $table->string('prodname',100);
            $table->integer('exchangenum');
            $table->string('stockid',100);
            $table->text('beizhu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_exchange');
    }
}
