<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCrmShenqingbaobeisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_crm_shenqingbaobei', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerid');
            $table->integer('linkmanid');
            $table->integer('chanceid');
            $table->text('introduce');
            $table->string('zhichi');
            $table->string('fujian');
            $table->string('createman',255);
            $table->datetime('createtime');
            $table->smallInteger('state');
            $table->string('piyu',255);
            $table->string('shenheman',50);
            $table->datetime('shenhetime');
            $table->text('zhuti',255);
            $table->string('tixingren',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_crm_shenqingbaobei');
    }
}
