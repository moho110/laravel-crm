<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_supply', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplyid',255);
            $table->string('supplyname',255);
            $table->string('supplyshortname',255);
            $table->string('enterstype',255);
            $table->string('calling',255);
            $table->string('linkman',255);
            $table->string('artificialperson',255);
            $table->string('chargesection',255);
            $table->string('postalcode',255);
            $table->string('phone',255);
            $table->string('fax',255);
            $table->string('contactaddress',255);
            $table->string('email',255);
            $table->string('netword',255);
            $table->string('bank',255);
            $table->string('accountnumber',255);
            $table->string('startdate',255);
            $table->string('enddate',255);
            $table->string('style',255);
            $table->string('user_flag',255);
            $table->string('user_id',255);
            $table->string('supplycn',255);
            $table->string('sysuser',255);
            $table->string('prodtype',255);
            $table->float('amtagio',255);
            $table->string('remark',255);
            $table->string('recommand',255);
            $table->string('payaccount',255);
            $table->double('paymoney');
            $table->double('factpaymoney');
            $table->double('nopaymoney');
            $table->double('datascope');
            $table->double('yufukuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_supply');
    }
}
