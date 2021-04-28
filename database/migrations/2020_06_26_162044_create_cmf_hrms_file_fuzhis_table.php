<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsFileFuzhisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_file_fuzhi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workId',255);
            $table->string('name',255);
            $table->string('inDepartment',255);
            $table->string('sex',4);
            $table->date('birthday');
            $table->string('telephone',20);
            $table->string('studyExp',255);
            $table->string('national',255);
            $table->text('memo');
            $table->date('recoverDate');
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
        Schema::dropIfExists('cmf_hrms_file_fuzhi');
    }
}
