<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rented_Vehicle extends Model
{
    protected $table='rented_vehicle';
    protected $fillable=[
        'rented_id',
        'user_id',
        'vehicle_id',
        'rented_date',
        'duration',
        'total_price',    
    ];
    public $incrementing = false;
}
