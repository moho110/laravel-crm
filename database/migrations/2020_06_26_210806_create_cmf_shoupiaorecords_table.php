<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfShoupiaorecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_shoupiaorecord', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplyid');
            $table->integer('caigoubillid');
            $table->string('kaipiaoneirong',255);
            $table->integer('piaojutype');
            $table->double('piaojujine');
            $table->string('fapiaono',255);
            $table->date('kaipiaodate');
            $table->string('qici',255);
            $table->string('kaipiaoren');
            $table->string('ifhuikuan',255);
            $table->string('huikuanid',255);
            $table->string('beizhu',255);
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
        Schema::dropIfExists('cmf_shoupiaorecord');
    }
}
