<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentMethodToRentedVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rented_vehicle', function (Blueprint $table) {
            $table->string('payment_method')->default('on delivery'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rented_vehicle', function (Blueprint $table) {
            $table->dropColumn('payment_method');
        });
    }
}
