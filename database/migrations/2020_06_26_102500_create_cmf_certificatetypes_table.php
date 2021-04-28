<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCertificatetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_certificatetype', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('user_id',50);
            $table->string('code',50);
            $table->string('user_flag',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_certificatetype');
    }
}
