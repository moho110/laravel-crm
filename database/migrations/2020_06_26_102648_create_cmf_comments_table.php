<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->integer('user_id');
            $table->integer('to_user_id');
            $table->integer('object_id');
            $table->integer('like_count');
            $table->integer('dislike_count');
            $table->integer('floor');
            $table->datetime('create_time');
            $table->datetime('delete_time');
            $table->integer('status');
            $table->integer('type');
            $table->string('table_name',64);
            $table->string('full_name',50);
            $table->string('email',255);
            $table->string('path',255);
            $table->text('url');
            $table->text('content');
            $table->text('more');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_comment');
    }
}
