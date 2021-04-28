<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSysMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_sys_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MENU_NAME',255);
            $table->string('IMAGE',255);
            $table->string('ENGLISHNAME',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_sys_menu');
    }
}
