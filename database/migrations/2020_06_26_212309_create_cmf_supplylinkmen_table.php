<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSupplylinkmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_supplylinkman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplyname',255);
            $table->string('beiyong',255);
            $table->string('gender',255);
            $table->string('phone',255);
            $table->string('fax',255);
            $table->string('email',255);
            $table->string('postcode',255);
            $table->string('mark',255);
            $table->string('business',255);
            $table->string('businessexpian',255);
            $table->string('address',255);
            $table->string('user_flag',255);
            $table->string('user_id',255);
            $table->string('supplycn',255);
            $table->integer('supplyid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_supplylinkman');
    }
}
