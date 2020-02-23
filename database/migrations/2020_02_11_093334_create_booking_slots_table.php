<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_slots', function (Blueprint $table) {
            $table->unsignedBigInteger('futsals_id');
            $table->unsignedBigInteger('time_slots_id');
            $table->foreign('futsals_id')
                ->references('id')
                ->on('futsals')
                ->onDelete('cascade');
            $table->foreign('time_slots_id')
                ->references('id')
                ->on('time_slots')
                ->onDelete('cascade');
            $table->primary(['futsals_id', 'time_slots_id']);
            $table->boolean('availability');
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
        Schema::dropIfExists('booking_slots');
    }
}
