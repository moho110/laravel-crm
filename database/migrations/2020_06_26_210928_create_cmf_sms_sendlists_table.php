<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSmsSendlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_sms_sendlist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('msg',255);
            $table->datetime('nowtime');
            $table->string('attime',255);
            $table->integer('destcount');
            $table->string('result',4);
            $table->string('errmsg',255);
            $table->integer('trytimes');
            $table->string('userid',255);
            $table->integer('batchid');
            $table->text('destid');
            $table->integer('leftcount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_sms_sendlist');
    }
}
