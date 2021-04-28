<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bankid',50);
            $table->string('bankcode',50);
            $table->string('bankname',50);
            $table->integer('syslock');
            $table->double('jine');
            $table->string('belong',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_bank');
    }
}
