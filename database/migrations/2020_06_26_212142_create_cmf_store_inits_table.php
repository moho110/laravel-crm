<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfStoreInitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_store_init', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prodid',255);
            $table->integer('storeid');
            $table->double('price');
            $table->double('num');
            $table->double('jine');
            $table->string('memo',255);
            $table->integer('flag');
            $table->string('prodname',255);
            $table->string('guige',255);
            $table->string('xinghao',255);
            $table->string('danwei',50);
            $table->string('typename',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_store_init');
    }
}
