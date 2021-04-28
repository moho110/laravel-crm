<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfFixedassetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_fixedasset', function (Blueprint $table) {
            $table->increments('id');
            $table->string('setName',255);
            $table->string('setNo',255);
            $table->string('setPichi',255);
            $table->string('setType');
            $table->string('purchaseID');
            $table->string('supply');
            $table->string('department',255);
            $table->string('person',255);
            $table->string('size',255);
            $table->string('status',20);
            $table->integer('quantity');
            $table->string('price',20);
            $table->string('count',255);
            $table->string('unit',30);
            $table->string('place',255);
            $table->string('purchaseDate',255);
            $table->string('billNum',255);
            $table->string('IDNumber',255);
            $table->string('memo',255);
            $table->string('creator',255);
            $table->datetime('createTime');
            $table->string('useDepartment',255);
            $table->string('useDirect',255);
            $table->string('testDepartment',255);
            $table->string('dutyMan',255);
            $table->string('qiyongDate',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_fixedasset');
    }
}
