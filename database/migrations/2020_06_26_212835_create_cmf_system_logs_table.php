<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSystemLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_system_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loginaction',255);
            $table->datetime('DATE');
            $table->string('REMOTE_ADDR',255);
            $table->string('HTTP_USER_AGENT',255);
            $table->string('QUERY_STRING');
            $table->string('SCRIPT_NAME',255);
            $table->string('USERID',255);
            $table->text('SQLTEXT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_system_log');
    }
}
