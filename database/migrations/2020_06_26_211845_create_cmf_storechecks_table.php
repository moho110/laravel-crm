<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfStorechecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_storecheck', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zhuti',255);
            $table->integer('storeid');
            $table->double('totalmoney');
            $table->string('state',255);
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->string('memo',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_storecheck');
    }
}
