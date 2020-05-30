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
            $table->bigInteger('id');
            $table->unsignedBigInteger('time_slots_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('time_slots_id')
                ->references('id')
                ->on('time_slots')
                ->onDelete('cascade');
            $table->string('payment')->default('remaining');
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
