<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hotel_id')->unsigned();
            $table->foreign('hotel_id')
                    ->references('id')
                    ->on('hotels')
                    ->onDelete('cascade')
                    ->onDelete('cascade');
            $table->string('room_no');
            $table->string('room_floor');
            $table->string('room_capacity');
            $table->string('room_type');
            $table->string('room_status');
            $table->string('room_price');
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
        Schema::dropIfExists('rooms');
    }
}
