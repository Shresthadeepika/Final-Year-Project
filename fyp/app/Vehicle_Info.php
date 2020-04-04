<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Info extends Model
{
    protected $table='vehicle_info';
    protected $fillable=[
        'vehicle_id',
        'type_id',
        'license',
        'number_plate',
        'vehicle_photo',
        'price_per_day',    
    ];
    public $incrementing = false;
}
