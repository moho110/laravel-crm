<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfDormBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_dorm_building', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buildingName',255);
            $table->string('buildingSum',255);
            $table->integer('floorNumber');
            $table->string('masterTeacherOne',255);
            $table->integer('manageBoundaryOne');
            $table->string('masterTeacherTwo',255);
            $table->string('manageBoundaryTwo',255);
            $table->string('masterTeacherThree',255);
            $table->string('manageBoundaryThree',255);
            $table->string('masterTeacherFour',255);
            $table->string('manageBoundaryFour',255);
            $table->string('stuSex',255);
            $table->string('memo',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_dorm_building');
    }
}
