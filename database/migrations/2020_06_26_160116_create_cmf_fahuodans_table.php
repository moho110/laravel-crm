<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfFahuodansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_fahuodan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerid');
            $table->integer('dingdanbillid');
            $table->string('fahuodan',50);
            $table->string('fahuoren',50);
            $table->datetime('fahuodate');
            $table->string('shouhuoren',50);
            $table->string('tel',50);
            $table->string('address',255);
            $table->string('mailcode',50);
            $table->string('fahuotype',50);
            $table->string('state',20);
            $table->integer('package');
            $table->float('weight');
            $table->float('yunfei');
            $table->string('jiesuantype',20);
            $table->string('beizhu',255);
            $table->double('totalnum');
            $table->double('totalmoney');
            $table->string('outtype',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_fahuodan');
    }
}
