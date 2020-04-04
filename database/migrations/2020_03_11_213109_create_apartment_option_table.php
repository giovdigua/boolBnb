<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_option', function (Blueprint $table) {
            $table->bigInteger('apartment_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('option_id')->references('id')->on('options');
            $table->primary(['apartment_id', 'option_id']);
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
        Schema::dropIfExists('apartment_option');
    }
}
