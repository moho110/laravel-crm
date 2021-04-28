<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfFixedassettuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_fixedassettui', function (Blueprint $table) {
            $table->increments('id');
            $table->string('setName',255);
            $table->string('setNo',255);
            $table->string('inDepartment',255);
            $table->string('returnMan',255);
            $table->string('approvalMan',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->datetime('createTime');
            $table->float('price');
            $table->integer('quantity');
            $table->float('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_fixedassettui');
    }
}
