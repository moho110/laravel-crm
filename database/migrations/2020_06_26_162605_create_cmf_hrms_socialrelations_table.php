<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsSocialrelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_socialrelation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('relation',255);
            $table->string('name',255);
            $table->string('political',255);
            $table->string('company',255);
            $table->string('staff',255);
            $table->string('creator',255);
            $table->date('createTime');
            $table->string('workId',255);
            $table->string('named',255);
            $table->string('inDepartment',255);
            $table->string('workAddress',255);
            $table->string('telephone',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_socialrelation');
    }
}
