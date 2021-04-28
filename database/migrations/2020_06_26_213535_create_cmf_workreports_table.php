<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfWorkreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_workreport', function (Blueprint $table) {
            $table->increments('id');
            $table->string('createman',50);
            $table->date('workdate');
            $table->text('content');
            $table->datetime('createtime');
            $table->string('shenheren',50);
            $table->string('piyu',50);
            $table->datetime('shenhetime');
            $table->string('state',6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_workreport');
    }
}
