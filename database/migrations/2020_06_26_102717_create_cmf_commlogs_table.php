<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCommlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_commlog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sysuser',50);
            $table->string('user_id',50);
            $table->integer('customerid');
            $table->string('commdate',100);
            $table->string('linkmanid',100);
            $table->string('project',100);
            $table->string('productid',100);
            $table->string('projectphase',100);
            $table->string('iscompete',100);
            $table->string('comminfo',100);
            $table->string('moniterinfo',100);
            $table->string('moniterman',100);
            $table->string('user_flag',25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_commlog');
    }
}
