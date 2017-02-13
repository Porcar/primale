<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('workers', function (Blueprint $table) {
          $table->increments('id');
          $table->boolean('sex')->default(False);
          $table->integer('age');
          $table->string('description');
          $table->boolean('isworking')->default(True);
          $table->boolean('location_workersplace')->default(False);
          $table->boolean('location_clientsplace')->default(False);
          $table->boolean('location_hotel')->default(True);
          $table->boolean('location_other')->default(False);

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('workers');
    }
}
