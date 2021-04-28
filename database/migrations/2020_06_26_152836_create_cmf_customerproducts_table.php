<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCustomerproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_customerproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theme',255);
            $table->string('priceMan',255);
            $table->string('clients',255);
            $table->string('reiceiver',255);
            $table->string('priceTime',255);
            $table->float('count');
            $table->string('saleChance',255);
            $table->text('jiaofuIntro',255);
            $table->text('toPayIntro');
            $table->text('packageExpIntro');
            $table->text('memo',255);
            $table->string('attach',255);
            $table->smallInteger('isExamine');
            $table->string('creator',255);
            $table->datetime('createTime');
            $table->string('examineMan',255);
            $table->datetime('examineTime');
            $table->smallInteger('unitid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_customerproduct');
    }
}
