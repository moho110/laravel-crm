<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCrmMytablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_crm_mytable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('moduleId',255);
            $table->string('moduleName',255);
            $table->string('modulePosition',255);
            $table->date('moduleAttr');
            $table->integer('displayLineNumber');
            $table->date('scrollDisplay');
            $table->string('creator',255);
            $table->string('createTime',255);
            $table->datetime('memo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_crm_mytable');
    }
}
