<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFutsalImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('futsal_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('futsal_id');
            $table->string('image');
            $table->timestamps();
            $table->foreign('futsal_id')
                ->references('id')
                ->on('futsals')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('futsal_images');
    }
}
