<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_form', function (Blueprint $table) {
            //$table->increments('contact_id');
            //$table->string('contact_name');
            //$table->string('contact_phone_number');
            //$table->string('contact_email');
            //$table->string('contact_subject');
            //$table->string('contact_message');
            //
            //$table->integer('property_id');
            $table->primary('contact_id');
            $table->foreign('property_id')->references('property_id')->on('property')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_form');
    }
}
