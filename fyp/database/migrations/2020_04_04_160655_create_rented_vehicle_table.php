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
            $table->unsignedBigInteger('user_id');            
            $table->string('vehicle_id'); 
            $table->date('rented_date');
            $table->string('duration');
            $table->string('total_price');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('vehicle_id')
                  ->references('vehicle_id')
                  ->on('vehicle_info');
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
