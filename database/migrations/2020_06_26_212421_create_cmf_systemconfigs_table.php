<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSystemconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_systemconfig', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CONTENT',255);
            $table->string('UNIT',255);
            $table->string('STATUS',255);
            $table->string('MEMO',255);
            $table->string('SHORTCODE',255);
            $table->string('TRANSCODE',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_systemconfig');
    }
}
