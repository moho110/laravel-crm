<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_notify', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('content',255);
            $table->string('to_user',255);
            $table->string('from_user');
            $table->string('ATTACHMENT');
            $table->date('createtime');
            $table->integer('ifread',255);
            $table->integer('ifsms',255);
            $table->integer('grade');
            $table->integer('ifemail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_notify');
    }
}
