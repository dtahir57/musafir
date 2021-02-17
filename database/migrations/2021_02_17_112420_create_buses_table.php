<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hotel_id')->unsigned();
            $table->foreign('hotel_id')
                    ->references('id')
                    ->on('hotels')
                    ->onDelete('cascade')
                    ->onDelete('cascade');
            $table->string('bus_registration_number');
            $table->string('bus_company');
            $table->string('bus_type');
            $table->string('bus_condition');
            $table->string('bus_status');
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
        Schema::dropIfExists('buses');
    }
}
