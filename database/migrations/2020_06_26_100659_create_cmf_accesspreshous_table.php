<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfAccesspreshousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_accesspreshou', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customerid',50);
            $table->string('linkman',50);
            $table->double('curchuzhi');
            $table->string('accountid',50);
            $table->double('jine');
            $table->boolean('opertype');
            $table->integer('guanlianbillid');
            $table->string('createman',50);
            $table->datetime('createtime');
            $table->text('beizhu');
            $table->integer('billdeptid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_accesspreshou');
    }
}
