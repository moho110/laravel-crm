<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfModifyrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_modifyrecord', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tablename',255);
            $table->string('keyfield',255);
            $table->string('keyvalue',255);
            $table->string('createman',255);
            $table->string('modifycontent',255);
            $table->datetime('createtime');
            $table->string('ip',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_modifyrecord');
    }
}
