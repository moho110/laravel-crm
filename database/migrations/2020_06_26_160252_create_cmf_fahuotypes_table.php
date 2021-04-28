<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfFahuotypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_fahuotype', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('kuaididan',255);
            $table->text('design');
            $table->string('linkman',255);
            $table->string('tel',255);
            $table->integer('shunxu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_fahuotype');
    }
}
