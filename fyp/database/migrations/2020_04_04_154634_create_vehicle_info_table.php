<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_info', function (Blueprint $table) {
            $table->uuid('vehicle_id');
            $table->bigIncrements('type_id');
            $table->foreign('type_id')
                  ->references('type_id')
                  ->on('vehicle_info');
            $table->string('license');
            $table->string('number_plate')->unique();
            $table->string('vehicle_photo');
            $table->string('price_per_day');
            
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
        Schema::dropIfExists('vehicle_info');
    }
}
