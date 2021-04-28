<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSystemprivateincsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_systemprivateinc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FILE',255);
            $table->string('MODULE',255);
            $table->string('DEPT_ID',255);
            $table->string('DEPT_NAME',255);
            $table->string('ROLE_ID',255);
            $table->string('ROLE_NAME',255);
            $table->string('USER_ID',255);
            $table->string('USER_NAME',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_systemprivateinc');
    }
}
