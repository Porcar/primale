<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSexDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sexdates', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('client_id')->unsigned();
        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

        $table->integer('worker_id')->unsigned();
        $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade')->onUpdate('cascade');

        $table->integer('start_hour')->unsigned()->default(0);
        $table->integer('end_hour')->unsigned()->default(0);

        $table->string('day');
        $table->date('date')->nullable();
        $table->integer('hours');
        $table->string('location');
        $table->string('observation')->nullable();
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
          Schema::drop('sexdates');
    }
}
