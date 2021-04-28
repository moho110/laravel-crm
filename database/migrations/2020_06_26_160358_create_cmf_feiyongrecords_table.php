<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfFeiyongrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_feiyongrecord', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('typeid');
            $table->double('jine');
            $table->smallInteger('kind');
            $table->integer('accountid');
            $table->date('chanshengdate');
            $table->string('createman',20);
            $table->datetime('createtime');
            $table->string('beizhu',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_feiyongrecord');
    }
}
