<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfAccessbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_accessbank', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bankid');
            $table->double('oldjine');
            $table->double('jine');
            $table->boolean('opertype');
            $table->integer('guanlianbillid');
            $table->string('createman');
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
        Schema::dropIfExists('cmf_accessbank');
    }
}
