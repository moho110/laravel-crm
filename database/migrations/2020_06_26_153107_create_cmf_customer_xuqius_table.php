<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCustomerXuqiusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_customer_xuqiu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zhuti',255);
            $table->string('tigongren',255);
            $table->integer('customerid');
            $table->integer('chanceid');
            $table->string('import',255);
            $table->string('content',500);
            $table->string('createman',50);
            $table->datetime('createtime');
            $table->string('fujian',255);
            $table->string('fangan',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_customer_xuqiu');
    }
}
