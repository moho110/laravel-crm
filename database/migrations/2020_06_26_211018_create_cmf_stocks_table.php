<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_stock', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('id',255);
            $table->string('user_flag',255);
            $table->string('user_id',255);
            $table->string('isClock',255);
            $table->string('leverno',255);
            $table->string('costtype',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_stock');
    }
}
