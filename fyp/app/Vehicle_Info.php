<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Info extends Model
{
    protected $table='vehicle_info';
    protected $primaryKey = 'vehicle_id';
    protected $fillable=[
        'vehicle_id',
        'type',
        'license',
        'number_plate',
        'vehicle_photo',
        'price_per_day',
        'company',
        'model',
        'year',
        'listed_id',
        'availability_status'    
    ];
    public $incrementing = false;
}
