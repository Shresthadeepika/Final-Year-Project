<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Vehicle_Info;

class Rented_Vehicle extends Model
{
    protected $table='rented_vehicle';
    protected $primaryKey ='rented_id';
    protected $fillable=[
        'rented_id',
        'user_id',
        'vehicle_id',
        'rented_date',
        'duration',
        'total_price', 
        'payment_method',
        'rent_status'   
    ];
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicleInfo()
    {
        return $this->belongsTo(Vehicle_Info::class,'vehicle_id');
    }
}
