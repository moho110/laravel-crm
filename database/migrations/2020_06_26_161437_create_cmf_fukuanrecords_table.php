<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfFukuanrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_fukuanrecord', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplyid');
            $table->integer('caigoubillid');
            $table->integer('qici');
            $table->date('paydate');
            $table->double('jine');
            $table->integer('ifkaipiao');
            $table->integer('accountid');
            $table->string('beizhu',255);
            $table->string('createman',20);
            $table->datetime('createtime');
            $table->integer('guanlianplanid');
            $table->double('oddment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_fukuanrecord');
    }
}
