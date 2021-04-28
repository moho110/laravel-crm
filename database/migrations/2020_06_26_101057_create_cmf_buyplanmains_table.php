<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfBuyplanmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_buyplanmain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zhuti',255);
            $table->string('supplyid',255);
            $table->string('linkman',255);
            $table->date('caigoudate');
            $table->integer('storeid');
            $table->date('daohuodate');
            $table->string('danhao',255);
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->double('totalmoney');
            $table->string('guanliandingdan',255);
            $table->string('guanliankehu',255);
            $table->text('beizhu');
            $table->string('beiyong1',255);
            $table->string('beiyong2',255);
            $table->string('beiyong3',255);
            $table->float('paymoney');
            $table->integer('state');
            $table->double('rukumoney');
            $table->double('shoupiaomoney');
            $table->integer('ifpay');
            $table->integer('shoupiaostate');
            $table->double('oddment');
            $table->smallInteger('user_flag');
            $table->integer('accountid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_buyplanmain');
    }
}
