<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfWuBuildinginformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_wu_buildinginformation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buildingNo',255);
            $table->string('buildingName',255);
            $table->string('buildingLocate',255);
            $table->string('unit',255);
            $table->string('buildingStruct',255);
            $table->string('type',255);
            $table->string('sum',255);
            $table->string('startDate',255);
            $table->string('finishDate',255);
            $table->string('jiaofuDate',255);
            $table->string('useIn',255);
            $table->string('area',255);
            $table->string('saledNum',255);
            $table->string('rentNum',255);
            $table->string('builder',255);
            $table->string('creator',255);
            $table->datetime('createTime');
            $table->text('memo',255);
            $table->string('optManage',255);
            $table->string('areaName',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_wu_buildinginformation');
    }
}
