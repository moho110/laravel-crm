<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSystemlangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_systemlang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fieldname',255);
            $table->string('tablename',255);
            $table->string('chinese',255);
            $table->string('english',255);
            $table->string('remark',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_systemlang');
    }
}
