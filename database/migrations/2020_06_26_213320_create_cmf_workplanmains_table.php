<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfWorkplanmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_workplanmain', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('createtime');
            $table->string('createman',255);
            $table->smallInteger('state');
            $table->string('zhuti',255);
            $table->text('content');
            $table->string('kind',255);
            $table->datetime('begintime');
            $table->datetime('endtime');
            $table->string('zhixingren',255);
            $table->datetime('finishtime');
            $table->string('shenheren',255);
            $table->smallInteger('shenchastate');
            $table->datetime('shenhetime');
            $table->string('shenhepishi',255);
            $table->string('fujian',255);
            $table->smallInteger('ifsms');
            $table->smallInteger('ifemail');
            $table->string('guanlianshiwu',255);
            $table->string('guanlianurl',255);
            $table->integer('guanlianid');
            $table->datetime('lastzhixingtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_workplanmain');
    }
}
