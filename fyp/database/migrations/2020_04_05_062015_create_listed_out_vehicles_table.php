<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListedOutVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listed_out_vehicles', function (Blueprint $table) {
            $table->bigIncrements('listed_id');
            $table->unsignedBigInteger('user_id');
            $table->string('vehicle_id');
            $table->string('delivery')->nullable();
            $table->date('available_from_date');
            $table->date('available_to_date');
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
        Schema::dropIfExists('listed_out_vehicles');
    }
}
