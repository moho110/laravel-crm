<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCrmCustomerMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_crm_customer_move', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clientId');
            $table->string('preUser',255);
            $table->string('nextUser',255);
            $table->string('operator',255);
            $table->datetime('operateTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_crm_customer_move');
    }
}
