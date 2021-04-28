<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_file', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workId',255);
            $table->string('name',255);
            $table->string('inDepartment',255);
            $table->string('sex',4);
            $table->string('marriage',8);
            $table->date('birthday');
            $table->string('national',255);
            $table->string('political',255);
            $table->string('IDNo',255);
            $table->string('hukou',255);
            $table->string('jiguan',255);
            $table->string('insuranceNo',255);
            $table->string('address',255);
            $table->string('postalCode',8);
            $table->string('email',255);
            $table->string('telephone',255);
            $table->string('studyExp',255);
            $table->string('professional',255);
            $table->string('college',255);
            $table->string('staff',255);
            $table->string('staffName',255);
            $table->string('politicalLevel',255);
            $table->string('computerLevel',255);
            $table->string('foreign',255);
            $table->integer('foreignLevel');
            $table->date('whenWork');
            $table->integer('workTime');
            $table->string('workStatus',255);
            $table->text('special');
            $table->text('memo');
            $table->string('attach',255);
            $table->string('photo',255);
            $table->date('entryUnitDate');
            $table->integer('unitWorkTime');
            $table->date('quitDate');
            $table->date('nowContractDate');
            $table->date('nowContractEndDate');
            $table->date('tuixiuDate');
            $table->integer('tuixiuAge');
            $table->string('workInFormal',255);
            $table->date('firstContractDate');
            $table->string('techLevel',255);
            $table->date('techExDate');
            $table->string('staffType',255);
            $table->string('staffbyName',255);
            $table->string('staffTechScore',255);
            $table->string('bank',255);
            $table->string('bankNo',255);
            $table->string('salaryLevel',255);
            $table->date('staffyinliBirthday');
            $table->text('personDesp');
            $table->string('passport',255);
            $table->string('bloody',255);
            $table->string('height',255);
            $table->string('weight',255);
            $table->string('eyesight',255);
            $table->string('health',255);
            $table->string('drivers',50);
            $table->text('workExp');
            $table->string('workExpAttach',255);
            $table->text('socialRelation');
            $table->string('socialRelationAttach',255);
            $table->date('recoverStaffDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_hrms_file');
    }
}
