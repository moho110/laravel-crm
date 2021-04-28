<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_department', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DEPT_NAME',255);
            $table->string('TEL_NO',255);
            $table->string('FAX_NO',255);
            $table->integer('DEPT_NO');
            $table->integer('DEPT_PARENT');
            $table->text('MANAGER');
            $table->text('LEADER1');
            $table->text('LEADER2');
            $table->text('DEPT_FUNC');
            $table->integer('orderno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_department');
    }
}
