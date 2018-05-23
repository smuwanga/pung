<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('sex');
            $table->date('date_of_birth');

            $table->string('art_number');
            $table->string('district');
            $table->string('sub_county');
            $table->string('health_facility');
            $table->string('patient_unique_number')->unique();
         
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
        Schema::drop("patients");
    }
}
