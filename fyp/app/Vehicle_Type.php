<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Type extends Model
{
    protected $table='vehicle_type';
    protected $fillable=[
        'type_id',
        'type',
        'num_of_wheels',
    ];
    public $incrementing = false;
}
