<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsFileLuyongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_file_luyong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',255);
            $table->string('sex',255);
            $table->date('birthday',255);
            $table->string('national',255);
            $table->string('political',255);
            $table->string('IDNo',255);
            $table->string('jiguan',255);
            $table->string('college',255);
            $table->string('studyExp',255);
            $table->string('staffName',255);
            $table->string('professional',255);
            $table->string('email',255);
            $table->string('creator',255);
            $table->date('createTime',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_file_luyong');
    }
}
