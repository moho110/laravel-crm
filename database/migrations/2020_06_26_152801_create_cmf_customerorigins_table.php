<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCustomeroriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_customerorigin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('user_id',255);
            $table->string('code',255);
            $table->string('user_flag',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_customerorigin');
    }
}
