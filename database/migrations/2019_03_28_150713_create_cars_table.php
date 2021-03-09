<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('manufacturer_id')->unsigned();
            $table->timestamps();

            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
        });

        Schema::create('body_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('fuel_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('transmissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('doors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount')->unsigned()->unique();
            $table->timestamps();
        });

        Schema::create('cylinders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount')->unique();
            $table->timestamps();
        });

        Schema::create('colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('origins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('body_type_id')->unsigned();
            $table->integer('fuel_type_id')->unsigned();
            $table->integer('transmission_id')->unsigned();
            $table->integer('door_id')->unsigned();
            $table->integer('cylinder_id')->unsigned();
            $table->integer('hp')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('year')->unsigned();
            $table->string('vin_number')->nullable();
            $table->integer('price');
            $table->integer('origin_id')->unsigned()->nullable();
            $table->integer('registration_id')->unsigned()->nullable();
            $table->integer('first_registration');
            $table->integer('condition_id')->unsigned();
            $table->integer('mileage');
            $table->string('co2_emission');
            $table->boolean('featured')->default(false);
            $table->boolean('slider')->default(false);
            $table->json('photos')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->foreign('body_type_id')->references('id')->on('body_types')->onDelete('cascade');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('cascade');
            $table->foreign('transmission_id')->references('id')->on('transmissions')->onDelete('cascade');
            $table->foreign('door_id')->references('id')->on('doors')->onDelete('cascade');
            $table->foreign('cylinder_id')->references('id')->on('cylinders')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('origin_id')->references('id')->on('origins')->onDelete('cascade');
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
        });

        Schema::create('cars_with_equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->integer('equipment_id')->unsigned();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturers');
        Schema::dropIfExists('models');
        Schema::dropIfExists('body_types');
        Schema::dropIfExists('fuel_types');
        Schema::dropIfExists('transmissions');
        Schema::dropIfExists('doors');
        Schema::dropIfExists('cylinders');
        Schema::dropIfExists('colors');
        Schema::dropIfExists('origins');
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('conditions');
        Schema::dropIfExists('equipments');
        Schema::dropIfExists('cars');
        Schema::dropIfExists('cars_with_equipments');
    }
}
