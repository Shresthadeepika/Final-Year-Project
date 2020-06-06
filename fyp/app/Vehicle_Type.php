<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicle_Info;

class Vehicle_Type extends Model
{
    protected $table='vehicle_type';
    protected $primaryKey = 'type_id';
    protected $fillable=[
        'type_id',
        'type',
        'num_of_seats',
    ];
    public $incrementing = false;

    public function vehicleInfo()
    {
        return $this->hasMany(Vehicle_Info::class,'type_id');
    }
}
