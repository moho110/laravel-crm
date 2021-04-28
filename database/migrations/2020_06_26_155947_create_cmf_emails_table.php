<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FROM_ID',20);
            $table->text('customers');
            $table->text('supplys');
            $table->text('others');
            $table->string('SUBJECT',100);
            $table->text('CONTENT');
            $table->datetime('SEND_TIME');
            $table->text('ATTACHMENT_ID');
            $table->text('ATTACHMENT_NAME');
            $table->integer('SEND_FLAG');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_email');
    }
}
