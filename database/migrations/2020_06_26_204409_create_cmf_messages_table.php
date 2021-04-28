<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_message', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userid',255);
            $table->string('msgtype',255);
            $table->string('content',255);
            $table->string('url',255);
            $table->integer('guanlianid');
            $table->datetime('createtime');
            $table->datetime('readtime');
            $table->smallInteger('flag');
            $table->datetime('attime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_message');
    }
}
