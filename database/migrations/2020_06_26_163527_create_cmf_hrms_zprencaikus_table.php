<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfHrmsZprencaikusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_hrms_zprencaiku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',255);
            $table->string('sex',255);
            $table->string('contact',255);
            $table->string('IDNo',255);
            $table->string('national',255);
            $table->date('birthday');
            $table->string('political',255);
            $table->string('jiguan',255);
            $table->string('hukouInPos',255);
            $table->string('studyExp',255);
            $table->string('staffName',255);
            $table->string('college',255);
            $table->string('professional',255);
            $table->string('secPro',255);
            $table->string('email',255);
            $table->string('familyTelephone',255);
            $table->string('familyAddr',255);
            $table->integer('postalCode');
            $table->text('edution');
            $table->text('workExp');
            $table->text('selfEval');
            $table->string('englishAbillity',255);
            $table->text('traingExp');
            $table->string('photo',255);
            $table->string('attach',255);
            $table->text('projectExp');
            $table->string('resumeLetter',255);
            $table->text('proObject');
            $table->string('luyongStatus',4);
            $table->string('creator',10);
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
        Schema::dropIfExists('cmf_hrms_zprencaiku');
    }
}
