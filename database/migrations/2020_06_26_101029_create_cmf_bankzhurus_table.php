<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfBankzhurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_bankzhuru', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accountid');
            $table->double('jine');
            $table->string('userid',50);
            $table->datetime('opertime');
            $table->integer('inouttype');
            $table->text('memo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_bankzhuru');
    }
}
