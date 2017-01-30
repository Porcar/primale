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

        $table->date('date');
        $table->integer('hours');
        $table->integer('status')->unsigned();
        $table->string('observation');
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
