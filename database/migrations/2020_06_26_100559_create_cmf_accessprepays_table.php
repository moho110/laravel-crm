<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfAccessprepaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_accessprepays', function (Blueprint $table) {
            $table->increments('id');          //自增
            $table->string('supplyid',100);    //字符型 
            $table->integer('linkmanid');      //整型
            $table->double('curchuzhi');       //浮点型
            $table->double('jine');            //浮点型
            $table->string('createman',50);    //字符型 
            $table->boolean('opertype');       //布尔型
            $table->integer('guanlianbillid'); //整型
            $table->datetime('createtime');    //日期型
            $table->integer('billdeptid');     //整型
            $table->string('accountid',50);    //字符型
            $table->text('beizhu');            //文本型
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_accessprepays');
    }
}
