<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsRewardPunishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_reward_punishment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',255);
            $table->string('status',255);
            $table->string('workId',255);
            $table->string('name',255);
            $table->string('inDepartment',255);
            $table->string('punishmentName',255);
            $table->string('punishmentReason',255);
            $table->string('punishmentContent',255);
            $table->string('approvalDep',255);
            $table->string('approvalMan',255);
            $table->date('approvalTime');
            $table->date('shengxiaobyDate');
            $table->text('memo');
            $table->string('cancelTime',255);
            $table->string('cancelReason',255);
            $table->string('creator',255);
            $table->date('createTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_reward_punishment');
    }
}
