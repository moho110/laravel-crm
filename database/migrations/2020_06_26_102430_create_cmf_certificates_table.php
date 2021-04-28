<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_certificate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',50);
            $table->string('supplyid',100);
            $table->string('certificatetype',100);
            $table->string('certificateno',100);
            $table->string('certificateinfo',100);
            $table->string('fromdate',100);
            $table->string('enddate',100);
            $table->string('explianstr',100);
            $table->string('user_flag',25);
            $table->string('fileaddress',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_certificate');
    }
}
