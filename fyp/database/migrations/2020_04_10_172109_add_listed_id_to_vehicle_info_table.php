<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddListedIdToVehicleInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_info', function (Blueprint $table) {
            $table->unsignedBigInteger('listed')->nullable();  
            $table->foreign('listed')
                  ->references('listed_id')
                  ->on('listed_out_vehicles')
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
        Schema::table('vehicle_info', function (Blueprint $table) {
            $table->dropColumn('listed_id');
        });
    }
}
