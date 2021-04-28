<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfProducttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_producttype', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->integer('ids');
            $table->integer('Code');
            $table->string('viewtype',5);
            $table->string('user_id',50);
            $table->string('user_flag',50);
            $table->string('leverno',255);
            $table->string('isbuyplan',5);
            $table->string('isautoout',5);
            $table->integer('parentid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_producttype');
    }
}
