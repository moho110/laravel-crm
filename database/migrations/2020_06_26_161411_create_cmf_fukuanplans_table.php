<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfFukuanplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_fukuanplan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplyid');
            $table->integer('caigoubillid');
            $table->date('plandate');
            $table->integer('qici');
            $table->double('jine');
            $table->string('createman',20);
            $table->datetime('createtime');
            $table->string('ifpay',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_fukuanplan');
    }
}
