<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfEduXingzhengTiaoxiububansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_edu_xingzheng_tiaoxiububan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term',255);
            $table->string('department',255);
            $table->string('person',255);
            $table->date('tiaoxiuTime');
            $table->string('tiaoxiuStart',10);
            $table->date('bubanTime');
            $table->string('bubanStart',10);
            $table->integer('tiaoxiuExStatus');
            $table->integer('tiaoxiuWorkFlowID');
            $table->string('tiaoxiuExMan',100);
            $table->string('tiaoxiuExTime',100);
            $table->integer('bubanExStatus');
            $table->integer('bubanWorkFlowID');
            $table->string('bubanExMan',100);
            $table->string('bubanExTime',100);
            $table->string('personName',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_edu_xingzheng_tiaoxiububan');
    }
}
