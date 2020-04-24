<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicle_Type;
use App\Listed_Out_Vehicle;
use App\Rented_Vehicle;

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

    public function type()
    {
        return $this->belongsTo(Vehicle_Type::class, 'type');
    }

    public function rented_vehicle()
    {
        return $this->hasOne(Rented_Vehicle::class, 'vehicle_id');
    }

    public function listed_outVehicle()
    {
        return $this->hasOne(Listed_Out_Vehicle::class, 'vehicle_id');
    }
}
