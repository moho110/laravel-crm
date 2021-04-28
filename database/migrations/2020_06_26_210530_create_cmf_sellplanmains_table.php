<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSellplanmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_sellplanmain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zhuti',255);
            $table->string('user_id',255);
            $table->string('supplyid',255);
            $table->string('chanceid',255);
            $table->string('sellplanno',255);
            $table->float('totalmoney');
            $table->integer('paytype');
            $table->float('huikuanjine');
            $table->float('fahuojine');
            $table->float('kaipiaojine');
            $table->date('plandate');
            $table->date('zuiwanfahuodate');
            $table->string('qianyueren');
            $table->smallInteger('user_flag');
            $table->string('beizhu',500);
            $table->string('fileaddress',255);
            $table->integer('fahuostate');
            $table->string('gaiyao',255);
            $table->string('storeid',255);
            $table->string('linkman',255);
            $table->string('address',255);
            $table->string('mobile',255);
            $table->datetime('createtime');
            $table->smallInteger('billtype');
            $table->integer('ifpay');
            $table->string('beiyong',50);
            $table->smallInteger('kaipiaostate');
            $table->string('fapiaoneirong',255);
            $table->string('fapiaotype',50);
            $table->string('fapiaono',50);
            $table->integer('fahuotype');
            $table->string('fahuodan',50);
            $table->double('fahuoyunfei');
            $table->string('yunfeitype',50);
            $table->double('oddment');
            $table->integer('integral');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_sellplanmain');
    }
}
