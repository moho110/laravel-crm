<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workId',255);
            $table->string('name',255);
            $table->date('transferDate',255);
            $table->string('inDepartment',255);
            $table->string('afterDep',255);
            $table->string('beforeStaff',255);
            $table->string('afterStaff',255);
            $table->string('beforegangwei',255);
            $table->string('aftergangwei',255);
            $table->string('transferReason',255);
            $table->string('staffMan',255);
            $table->string('memo',255);
            $table->string('jobsSituation',255);
            $table->string('transferType',255);
            $table->string('creator',255);
            $table->date('creatTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_transfer');
    }
}
