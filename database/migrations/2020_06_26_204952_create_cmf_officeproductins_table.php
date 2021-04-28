<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfOfficeproductinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_officeproductin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('officeName',255);
            $table->string('officeNo',255);
            $table->string('inWarehouse',255);
            $table->integer('inQuantity');
            $table->string('staffMan',255);
            $table->date('approvalMan',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->datetime('createTime');
            $table->double('price');
            $table->integer('quantity');
            $table->integer('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_officeproductin');
    }
}
