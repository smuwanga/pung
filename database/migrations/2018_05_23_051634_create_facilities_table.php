<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->string('nhpi_code')->unique();
            $table->string('hsdt_code');
            $table->string('country');
            $table->string('region');

            $table->string('sub_region');
            $table->string('district');
            $table->string('county');
            $table->string('sub_county');
            $table->string('parish');

            $table->string('facility_level');
            $table->string('hsd');
            $table->string('authority');
            $table->string('authority_description');
            $table->string('ownership_name');

            $table->string('ownership_description');
            $table->string('operational_status');
            $table->string('email_address');
            $table->string('telephone_number');
            $table->string('geo_coordinates');

            $table->string('data_year');
            $table->string('services_offered');
            $table->string('comments');
            

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
        Schema::drop('facilities');
    }
}
