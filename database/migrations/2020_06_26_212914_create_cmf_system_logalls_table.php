<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfSystemLogallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmf_system_logall', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('currentTime');
            $table->integer('executeTime');
            $table->string('SQL',255);
            $table->integer('Slow_launch_threads');
            $table->integer('Threads_cached');
            $table->integer('Threads_connected');
            $table->integer('Threads_created');
            $table->integer('Threads_running');
            $table->integer('Qcache_free_blocks');
            $table->integer('Qcache_free_memory');
            $table->integer('Qcache_hits');
            $table->integer('Qcache_inserts');
            $table->integer('Qcache_lowmem_prunes');
            $table->integer('Qcache_not_cached');
            $table->integer('Qcache_queries_in_cache');
            $table->integer('Qcache_total_blocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmf_system_logall');
    }
}
