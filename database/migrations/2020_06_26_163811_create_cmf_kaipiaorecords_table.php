<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfKaipiaorecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_kaipiaorecord', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerid');
            $table->integer('dingdanbillid');
            $table->string('kaipiaoneirong',255);
            $table->integer('piaojutype');
            $table->double('piaojujine');
            $table->string('fapiaono',255);
            $table->date('kaipiaodate');
            $table->string('qici',50);
            $table->string('kaipiaoren',255);
            $table->string('ifhuikuan',2);
            $table->string('huikuanid',50);
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
        Schema::dropIfExists('cmf_kaipiaorecord');
    }
}
