<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');

            //Lunes
            $table->integer('monday_start_hour')->unsigned()->default(0);
            $table->integer('monday_end_hour')->unsigned()->default(0);
            $table->boolean('monday_active')->default(False);
            $table->integer('monday_hours')->unsigned()->default(0);

            //Martes
            $table->integer('tuesday_start_hour')->unsigned()->default(0);
            $table->integer('tuesday_end_hour')->unsigned()->default(0);
            $table->boolean('tuesday_active')->default(False);
            $table->integer('tuesday_hours')->unsigned()->default(0);

            //Miercoles
            $table->integer('wednesday_start_hour')->unsigned()->default(0);
            $table->integer('wednesday_end_hour')->unsigned()->default(0);
            $table->boolean('wednesday_active')->default(False);
            $table->integer('wednesday_hours')->unsigned()->default(0);

            //Jueves
            $table->integer('thursday_start_hour')->unsigned()->default(0);
            $table->integer('thursday_end_hour')->unsigned()->default(0);
            $table->boolean('thursday_active')->default(False);
            $table->integer('thursday_hours')->unsigned()->default(0);

            //Viernes
            $table->integer('friday_start_hour')->unsigned()->default(0);
            $table->integer('friday_end_hour')->unsigned()->default(0);
            $table->boolean('friday_active')->default(False);
            $table->integer('friday_hours')->unsigned()->default(0);

            //Sabados
            $table->integer('saturday_start_hour')->unsigned()->default(0);
            $table->integer('saturday_end_hour')->unsigned()->default(0);
            $table->boolean('saturday_active')->default(False);
            $table->integer('saturday_hours')->unsigned()->default(0);

            //Domingos
            $table->integer('sunday_start_hour')->unsigned()->default(0);
            $table->integer('sunday_end_hour')->unsigned()->default(0);
            $table->boolean('sunday_active')->default(False);
            $table->integer('sunday_hours')->unsigned()->default(0);


            $table->integer('worker_id')->unsigned();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('schedules');
    }
}
