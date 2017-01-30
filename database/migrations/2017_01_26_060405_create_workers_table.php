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
          $table->integer('price');
          $table->boolean('isworking')->default(True);
          $table->date('start_date')->nullable(); //first day working
          $table->date('end_date')->nullable();  //last day working

          //Lunes
          $table->boolean('monday_active')->default(False);
          $table->integer('monday_hours')->unsigned()->default(0);

          //Martes
          $table->boolean('tuesday_active')->default(False);
          $table->integer('tuesday_hours')->unsigned()->default(0);

          //Miercoles
          $table->boolean('wednesday_active')->default(False);
          $table->integer('wednesday_hours')->unsigned()->default(0);

          //Jueves
          $table->boolean('thursday_active')->default(False);
          $table->integer('thursday_hours')->unsigned()->default(0);

          //Viernes
          $table->boolean('friday_active')->default(False);
          $table->integer('friday_hours')->unsigned()->default(0);

          //Sabados
          $table->boolean('saturday_active')->default(False);
          $table->integer('saturday_hours')->unsigned()->default(0);

          //Domingos
          $table->boolean('sunday_active')->default(False);
          $table->integer('sunday_hours')->unsigned()->default(0);



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
