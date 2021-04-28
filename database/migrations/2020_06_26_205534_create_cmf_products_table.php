<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productname',255);
            $table->string('measureid',255);
            $table->text('mode');
            $table->text('standard');
            $table->integer('producttype');
            $table->float('storemin');
            $table->float('storemax');
            $table->string('user_flag',255);
            $table->double('sellprice');
            $table->string('productcn',50);
            $table->double('sellprice2');
            $table->double('sellprice3');
            $table->string('fileaddress',255);
            $table->string('oldproductid',255);
            $table->string('ifkucun',2);
            $table->string('relatefiles',255);
            $table->string('supplyid',11);
            $table->string('hascolor',2);
            $table->double('sellprice4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_product');
    }
}
