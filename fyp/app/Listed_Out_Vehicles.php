<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listed_Out_Vehicles extends Model
{
    protected $table='listed_out_vehicles';
    protected $fillable=[
        'listed_id',
        'user_id',
        'vehicle_id',
        'delivery',
        'available_from_date',
        'available_to_date',    
    ];
    public $incrementing = false;
}
