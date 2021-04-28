<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfWuBooleansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_wu_boolean', function (Blueprint $table) {
            $table->increments('id');
            $table->string('yesorno',255);
            $table->text('memo');
            $table->string('creator',255);
            $table->datetime('createTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_wu_boolean');
    }
}
