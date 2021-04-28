<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfOfficeTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_office_task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TASK_TYPE',4);
            $table->integer('INTERVAL');
            $table->time('EXEC_TIME');
            $table->date('LAST_EXEC');
            $table->string('TASK_URL',255);
            $table->string('TASK_NAME',255);
            $table->string('TASK_DESC',255);
            $table->string('TASK_CODE',255);
            $table->string('USE_FLAG',4);
            $table->string('SYS_TASK',4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_office_task');
    }
}
