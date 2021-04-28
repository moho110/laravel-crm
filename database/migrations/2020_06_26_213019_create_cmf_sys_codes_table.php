<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSysCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_sys_code', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CODE_NO',255);
            $table->text('CODE_NAME',255);
            $table->string('CODE_ORDER',255);
            $table->string('PARENT_NO',255);
            $table->integer('CODE_FLAG');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_sys_code');
    }
}
