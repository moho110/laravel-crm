<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSupplyproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_supplyproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',255);
            $table->string('supplyid',255);
            $table->string('productid',255);
            $table->float('productprice');
            $table->string('pricedate',255);
            $table->string('explianstr');
            $table->string('user_flag',255);
            $table->string('cycle');
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
        Schema::dropIfExists('cmf_supplyproduct');
    }
}
