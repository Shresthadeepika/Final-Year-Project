<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentedVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rented_vehicle', function (Blueprint $table) {
            $table->bigIncrements('rented_id');
            $table->bigIncrements('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->uuid('vehicle_id');
            $table->foreign('vehicle_id')
                  ->references('vehicle_id')
                  ->on('vehicle_info');
            $table->date('rented_date');
            $table->string('duration');
            $table->string('total_price');
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
        Schema::dropIfExists('rented_vehicle');
    }
}
