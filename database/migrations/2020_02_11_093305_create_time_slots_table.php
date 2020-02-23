<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slots')->nullable();
            $table->timestamps();
        });
        $data = [
            [
                'id'                    => 1,
                'slots'                  => '6:00-7:00',
            ],
            [
                'id'                    => 2,
                'slots'                  => '7:00-8:00',
            ]
        ];
        DB::table('time_slots')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_slots');
    }
}
