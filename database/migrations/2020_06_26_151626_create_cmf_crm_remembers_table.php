<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCrmRemembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_crm_remember', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('linkmanid');
            $table->string('mem_type',255);
            $table->integer('customerid');
            $table->date('mem_date');
            $table->datetime('createtime');
            $table->string('operman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_crm_remember');
    }
}
