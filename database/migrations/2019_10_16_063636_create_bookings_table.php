<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('purpose');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('reserved_by'); //fk user_id
            $table->enum('status',['PENDING','CONFIRMED','CANCELLED'])->default('PENDING');
            $table->timestamps();

            //foreign key
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('reserved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
