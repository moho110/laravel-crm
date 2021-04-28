<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSystemprivateconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_systemprivateconfig', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category',255);
            $table->string('table',255);
            $table->string('object',255);
            $table->string('views');
            $table->integer('column');
            $table->text('other');
            $table->string('creator',255);
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
        Schema::dropIfExists('cmf_systemprivateconfig');
    }
}
