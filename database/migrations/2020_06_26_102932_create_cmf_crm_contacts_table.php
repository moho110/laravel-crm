<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCrmContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_crm_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerid');
            $table->string('linkmanid',20);
            $table->string('user_id',50);
            $table->string('createman',50);
            $table->string('contact',20);
            $table->string('chance',20);
            $table->string('stage',10);
            $table->text('describes');
            $table->datetime('createtime');
            $table->datetime('contacttime');
            $table->datetime('nextcontacttime');
            $table->string('nextissue',10);
            $table->string('alreadycontact',2);
            $table->string('public',2);
            $table->string('priority',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_crm_contact');
    }
}
