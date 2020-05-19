<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Listed_Out_Vehicle;
use App\Rented_Vehicle;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'address',
        'gender',
        'contact_num',
        'license',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rented_vehicle()
    {
        return $this->hasMany(Rented_Vehicle::class, 'user_id');
    }

    public function listed_outVehicle()
    {
        return $this->hasMany(Listed_Out_Vehicles::class, 'user_id');
    }
}
