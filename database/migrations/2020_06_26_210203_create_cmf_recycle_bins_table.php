<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfRecycleBinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_recycle_bin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('object_id');
            $table->datetime('create_time');
            $table->string('table_name',255);
            $table->string('name',255);
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_recycle_bin');
    }
}
