<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCallchulisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_callchuli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tel',20);
            $table->string('customer',255);
            $table->string('linkman',50);
            $table->text('content');
            $table->string('createman',50);
            $table->datetime('createtime');
            $table->boolean('ifchuli');
            $table->datetime('chulitime');
            $table->string('calltype',20);
            $table->string('callertype',20);
            $table->integer('customerid');
            $table->string('chulicontent',255);
            $table->integer('linkmanid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_callchuli');
    }
}
