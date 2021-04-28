<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCrmChancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_crm_chance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chanceTheme',255);
            $table->string('clientName',255);
            $table->string('linkMan',255);
            $table->date('findTime');
            $table->text('clientNeed');
            $table->date('preSignTime');
            $table->double('preCount');
            $table->string('enable',255);
            $table->string('recentStatus');
            $table->string('status');
            $table->string('creator',255);
            $table->datetime('createTime');
            $table->text('bak');
            $table->datetime('lastContactTime');
            $table->binary('attach',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_crm_chance');
    }
}
