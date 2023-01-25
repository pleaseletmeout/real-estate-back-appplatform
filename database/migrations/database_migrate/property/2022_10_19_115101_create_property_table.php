<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            //$table->increments('property_id');
            //$table->string('property_type');
            //$table->string('property_address');
            //$table->string( 'no_of_bedrooms');
            //$table->string('no_of_bathrooms');
            //$table->string('area_size');
            $table->primary('property_id');
            //$table->string('property_name');
            //$table->float('property_price');
            //$table->string('image_link', 255);
            //$table->text('property_description');
            //$table->boolean('property_status');
            //$table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property');
    }
}
