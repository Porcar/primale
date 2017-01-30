<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('medias', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('worker_id')->unsigned();
        $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade')->onUpdate('cascade');

        $table->string('image');
        $table->string('video');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medias');
    }
}
