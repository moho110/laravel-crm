<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfOfficeproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_officeproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('officeName',255);
            $table->string('officeNo',255);
            $table->string('officeType',255);
            $table->string('specSize',255);
            $table->string('unit',255);
            $table->integer('quantity');
            $table->string('warehouseInfo',255);
            $table->float('price');
            $table->float('totalCount');
            $table->string('brand',255);
            $table->string('savedPlace',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->datetime('createTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_officeproduct');
    }
}
