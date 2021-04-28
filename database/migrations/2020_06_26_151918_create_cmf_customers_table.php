<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplyid',100);
            $table->string('supplyname',100);
            $table->string('supplyshortname',100);
            $table->string('enterstype',100);
            $table->string('calling',100);
            $table->string('state',100);
            $table->string('membercard',100);
            $table->string('chargesection',100);
            $table->string('postalcode',100);
            $table->string('phone',100);
            $table->string('fax',100);
            $table->string('contactaddress',100);
            $table->string('email',100);
            $table->string('netword',100);
            $table->string('bank',100);
            $table->string('accountnumber',100);
            $table->string('startdate',100);
            $table->string('enddate',100);
            $table->string('style',100);
            $table->string('user_flag',100);
            $table->string('user_id',100);
            $table->string('supplycn',100);
            $table->string('sysuser',100);
            $table->text('explainStr');
            $table->text('briefStr');
            $table->string('prodprice',50);
            $table->string('amtagio',255);
            $table->string('remark',255);
            $table->text('recommand');
            $table->string('getaccount',100);
            $table->double('yuchuzhi');
            $table->double('factgetmoney');
            $table->double('nogetmoney');
            $table->string('origin',25);
            $table->string('salemode',25);
            $table->string('property',25);
            $table->string('datascope',100);
            $table->datetime('createdate');
            $table->integer('integral');
            $table->datetime('lasttracetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_customer');
    }
}
