<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSexdateTagWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sexdate_tag_worker', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tag_worker_id')->unsigned();
            $table->foreign('tag_worker_id')->references('id')->on('tag_workers')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('sexdate_id')->unsigned();
            $table->foreign('sexdate_id')->references('id')->on('sexdates')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sexdate_tag_worker');
    }
}
