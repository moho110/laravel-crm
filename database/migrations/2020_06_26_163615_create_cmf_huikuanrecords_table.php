<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHuikuanrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_huikuanrecord', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerid');
            $table->integer('dingdanbillid');
            $table->integer('qici');
            $table->date('paydate');
            $table->double('jine');
            $table->integer('ifkaipiao');
            $table->integer('accountid');
            $table->string('beizhu',255);
            $table->string('createman',25);
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
        Schema::dropIfExists('cmf_huikuanrecord');
    }
}
