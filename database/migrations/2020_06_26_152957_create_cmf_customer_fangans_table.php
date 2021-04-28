<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCustomerFangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_customer_fangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zhuti',255);
            $table->integer('customerid');
            $table->string('chanceid',255);
            $table->string('content',255);
            $table->string('fankui',255);
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->string('fujian',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_customer_fangan');
    }
}
