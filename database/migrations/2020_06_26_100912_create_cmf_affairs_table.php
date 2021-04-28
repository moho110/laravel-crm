<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfAffairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_affair', function (Blueprint $table) {
            $table->increments('id');
            $table->string('USER_ID',20);
            $table->datetime('BEGIN_TIME');
            $table->datetime('END_TIME');
            $table->integer('TYPE');
            $table->date('REMIND_DATE');
            $table->datetime('REMIND_TIME');
            $table->text('CONTENT');
            $table->date('LAST_REMIND');
            $table->string('SMS2_REMIND',2);
            $table->date('LAST_SMS2_REMIND');
            $table->string('MANAGER_ID',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_affair');
    }
}
