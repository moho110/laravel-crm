<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengPaibansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_paiban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('termName',50);
            $table->integer('week');
            $table->integer('day');
            $table->date('kaoqinDate');
            $table->string('className',50);
            $table->text('paipanPerson');
            $table->string('memo',255);
            $table->string('creator',50);
            $table->datetime('createTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_paiban');
    }
}
